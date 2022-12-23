<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\QBO;
use Illuminate\Support\Facades\DB;
use Hash;
use Session;
use QuickBooksOnline\API\DataService\DataService;

class QBOController extends Controller
{
        function connectQBO(Request $req){
                $dataService = DataService::Configure(array(
                        'auth_mode' => 'oauth2',
                        'ClientID' => config('QBO.client_id'),
                        'ClientSecret' =>  config('QBO.client_secret'),
                        'RedirectURI' => config('QBO.oauth_redirect_uri'),
                        'scope' => config('QBO.oauth_scope'),
                        'baseUrl' => "development"
                ));
                $OAuth2LoginHelper = $dataService->getOAuth2LoginHelper();
                // Get the Authorization URL from the SDK
                $authUrl = $OAuth2LoginHelper->getAuthorizationCodeURL();
                return redirect($authUrl);
        }

        function GetAccountById(Request $req){
                print_r($req);
        }

        
        function authorizeQBO(Request $req)
        {
                $dataService = DataService::Configure(array(
                        'auth_mode' => 'oauth2',
                        'ClientID' => config('QBO.client_id'),
                        'ClientSecret' =>  config('QBO.client_secret'),
                        'RedirectURI' => config('QBO.oauth_redirect_uri'),
                        'scope' => config('QBO.oauth_scope'),
                        'baseUrl' => "development"
                ));

                $OAuth2LoginHelper = $dataService->getOAuth2LoginHelper();
                $parseUrl = $_SERVER['QUERY_STRING'];
                parse_str($parseUrl, $arr);
                if(empty($arr['code'])){
                        return redirect('/connect-to-qbo');
                }
                /*
                * Update the OAuth2Token
                */
                //echo $arr['code'];
                $accessToken =    $OAuth2LoginHelper->exchangeAuthorizationCodeForToken($arr['code'], $arr['realmId']);

                $dataService->updateOAuth2Token($accessToken);
                
                $email=Session::get('id');
                $accessTokenValue = $accessToken->getAccessToken();
                $refreshTokenValue = $accessToken->getRefreshToken();
                

                $asset = curl_init();
                $base_url=env('QBO_URL');
                curl_setopt_array($asset, array(
                        CURLOPT_URL => $base_url.'/v3/company/'.$arr['realmId'].'/query?minorversion=62',
                        CURLOPT_RETURNTRANSFER => true,
                        CURLOPT_ENCODING => '',
                        CURLOPT_MAXREDIRS => 10,
                        CURLOPT_TIMEOUT => 0,
                        CURLOPT_FOLLOWLOCATION => true,
                        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                        CURLOPT_CUSTOMREQUEST => 'POST',
                        CURLOPT_POSTFIELDS =>'Select * from Account',
                        CURLOPT_HTTPHEADER => array(
                            'User-Agent: QBOV3-OAuth2-Postman-Collection',
                            'Accept: application/json',
                            'Content-Type: application/text',
                            'Authorization: Bearer '.$accessTokenValue
                        ),
                ));
                $assetresponse = curl_exec($asset);
                $assetres1=json_decode($assetresponse);
                foreach($assetres1->QueryResponse->Account as $account){
                        $check = DB::table('QBO_Account')->where('QBO_account_id',$account->Id)->where('company_id',$arr['realmId'])->get()->count();
                        if($check>0)
                        {
                                
                        }
                        else
                        {
                                
                                if(empty($account->AcctNum)){

                                        $values = array('QBO_account_id' => $account->Id,'QBO_ac_name' => $account->Name,'company_id' => $arr['realmId'],'classification' => $account->Classification,'account_type' => $account->AccountType,'account_subtype' => $account->AccountSubType);
                                        $insert=DB::table('QBO_Account')->insert($values);
                                }
                                else{
                                        $values = array('QBO_account_id' => $account->Id,'QBO_ac_name' => $account->Name,'QBO_ac_number' => $account->AcctNum,'company_id' => $arr['realmId'],'classification' => $account->Classification,'account_type' => $account->AccountType,'account_subtype' => $account->AccountSubType);
                                        $insert=DB::table('QBO_Account')->insert($values);
                                }
                        }
                }
                $count = DB::table('company')
                    ->where('company_id',$arr['realmId'])
                    ->get()->count();
                if($count>0){
                }
                else{
                     $user_id = Session::get('id');
                     $values = array('refresh_token' => $refreshTokenValue,'code' => $arr['code'],'realmid' => $arr['realmId'],'company_id' => $arr['realmId'],'user_id' => $user_id);
                     $insert=DB::table('company')->insert($values);        
                }
                $company=DB::table('company')->where('company_id',$arr['realmId'])->get();
                if(!empty($company->company_name)){
                     return redirect('/company-list');                        
                }
                /*
                * Setting the accessToken for session variable
                */
                $req->session()->put('accessToken',$accessTokenValue);
                $req->session()->put('realmid',$arr['realmId']);

                return redirect('/company-register');
        }

        function setcompanydata($id,Request $req){
                $user=DB::table('company')->where('company_id', $id)->get();
                $dataService = DataService::Configure(array(
                    'auth_mode' => 'oauth2',
                    'ClientID' => config('QBO.client_id'),
                    'ClientSecret' =>  config('QBO.client_secret'),
                    'RedirectURI' => config('QBO.oauth_redirect_uri'),
                    'scope' => config('QBO.oauth_scope'),
                    'baseUrl' => "development"
                ));
                $OAuth2LoginHelper = $dataService->getOAuth2LoginHelper();
                $token = $OAuth2LoginHelper->refreshAccessTokenWithRefreshToken($user[0]->refresh_token);
                $Token=$token->getAccessToken();
                $refreshTokenValue = $token->getRefreshToken();
                DB::table('company')->where('company_id', $id)->update(['refresh_token' => $refreshTokenValue]);
                $req->session()->put('accessToken',$Token);
                $req->session()->put('start_date',$user[0]->date_format);
                $req->session()->put('realmid',$user[0]->realmid);
                return redirect('/company-register');
        }
}
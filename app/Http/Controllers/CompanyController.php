<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use \Crypt;
use Hash;
use Auth;
use Session;
use Storage;
use Excel; 
use App\Imports\CompanyImport;
use QuickBooksOnline\API\DataService\DataService;

class CompanyController extends Controller
{

    private $tbl_company;
    private $tbl_users;
    private $tbl_transaction;
    private $tbl_rules;
    private $tbl_fa_depreciation;
    private $tbl_QBO_account;
    private $tbl_company_user;


    public function __construct()
    {
        $this->tbl_company=env('TABLE_COMPANY');
        $this->tbl_users=env('TABLE_USERS');
        $this->tbl_transaction=env('TABLE_TRANSACTIONS');
        $this->tbl_rules=env('TABLE_RULES');
        $this->tbl_fa_depreciation=env('TABLE_FA_DS');
        $this->tbl_QBO_account=env('TABLE_QBO_ACCOUNT');
        $this->tbl_company_user=env('TABLE_COMPANY_USER');
    }

    //Get Company list by users
    function companylist(){
        $user_id = Session::get('id');
        $email = Session::get('email');
        $company = DB::table($this->tbl_company)->where('user_id', '=', $user_id)->get();
        $usercompany=DB::table($this->tbl_company)->select('company.company_id','company.company_name')->join('company_user','company_user.company_id','=','company.company_id')->where(['company_user.flag' => '1','company_user.user_email' => $email])->get();
        $company = DB::table($this->tbl_company)->where('user_id', '=', $user_id)->get();
        return view('company-list', compact('company','usercompany'));    
    }

    //update company data
    function updatecompany(Request $request){
        $company_id = Session::get('realmid');
        //echo '<pre>';print_r($_POST);echo '</pre>';
        $count=1;
        foreach($_POST['asset_id'] as $key=>$val){
            $count;
            if (str_contains($_POST['asset_account'][$key], '-')) { 
                //$assetaccount = trim(strstr($_POST['asset_account'][$key], '-', true));
                //$assetaccount = trim(strstr($_POST['asset_account'][$key], '-');
                $assetaccount = trim(substr($_POST['asset_account'][$key], strpos($_POST['asset_account'][$key], '-') + 1));
            }
            else{
                $assetaccount = trim($_POST['asset_account'][$key]);   
            }

            if (str_contains($_POST['accumulated_depreciation_account'][$key], '-')) { 
                $accumulateddepreciationaccount = trim(substr($_POST['accumulated_depreciation_account'][$key], strpos($_POST['accumulated_depreciation_account'][$key], '-') + 1));
            }
            else{
                $accumulateddepreciationaccount = trim($_POST['accumulated_depreciation_account'][$key]);   
            }

            if (str_contains($_POST['depreciation_account'][$key], '-')) { 
                $depreciation_account = trim(substr($_POST['depreciation_account'][$key], strpos($_POST['depreciation_account'][$key], '-') + 1));
            }
            else{
                $depreciation_account = trim($_POST['depreciation_account'][$key]);   
            }

            if (str_contains($_POST['glfa'][$key], '-')) { 
                
                $glfa = trim(substr($_POST['glfa'][$key], strpos($_POST['glfa'][$key], '-') + 1));
            }
            else{
                $glfa = trim($_POST['glfa'][$key]);   
            }
            
            $as_count=DB::table($this->tbl_QBO_account)->where('QBO_ac_name', '=', $assetaccount)->where('company_id', $company_id)->count();
            
            $ada_count = DB::table($this->tbl_QBO_account)->where('QBO_ac_name', '=', $accumulateddepreciationaccount)->where('company_id', $company_id)->count();
            
            $da_count = DB::table($this->tbl_QBO_account)->where('QBO_ac_name', '=', $depreciation_account)->where('company_id', $company_id)->count();
            
            $glfa_count = DB::table($this->tbl_QBO_account)->where('QBO_ac_name', '=', $glfa)->where('company_id', $company_id)->count();
            

            if($as_count>0 && $ada_count>0 && $da_count>0 && $glfa_count>0){
                $as = DB::table($this->tbl_QBO_account)->where('QBO_ac_name', '=', $assetaccount)->where('company_id', $company_id)->first();
                $ada = DB::table($this->tbl_QBO_account)->where('QBO_ac_name', '=', $accumulateddepreciationaccount)->where('company_id', $company_id)->first();
                $da = DB::table($this->tbl_QBO_account)->where('QBO_ac_name', '=', $depreciation_account)->where('company_id', $company_id)->first();
                $glfa = DB::table($this->tbl_QBO_account)->where('QBO_ac_name', '=', $glfa)->where('company_id', $company_id)->first();
                $asset[$key]['asset_category']    = $_POST['asset_category'][$key];
                $asset[$key]['QBO_FA_ac_id']      = $as->QBO_account_id;
                $asset[$key]['QBO_acc_dep_ac']    = $ada->QBO_account_id;
                $asset[$key]['QBO_dep_ac']        = $da->QBO_account_id;
                $asset[$key]['QBO_gain_loss_ac']  = $glfa->QBO_account_id;
                $asset[$key]['dep_method']        = $_POST['depreciation_method'][$key];
                $asset[$key]['default_life']      = $_POST['month'][$key];
                $asset[$key]['company_id']        = $company_id;
                $count++;
            }
        }
        
        if ($request->hasFile('image-upload')) {
            $path = $request->file('image-upload')->getRealPath();
            $data = Excel::import(new CompanyImport,request()->file('image-upload'));
        }
        
        $finalResult = DB::table($this->tbl_company)->where('company_id', $company_id)->update(['company_name' => $request->company_name,'default_currency'=>$request->currency,'industry'=>$request->industry,'date_format' => $request->start_date,'fiscal_year'=>$request->fiscal_date,'decimal_round'=>$request->decimal,'deminus_amount' => $request->deminus,'first_month_depreciation_method'=>$request->first_month_depreciation]);
        if($finalResult){
            if(count($asset)>0){
                foreach($asset as $val){
                    $values = array('asse_category' => $val['asset_category'],'QBO_FA_ac_id' => $val['QBO_FA_ac_id'],'QBO_acc_dep_ac' => $val['QBO_acc_dep_ac'],'QBO_dep_ac' =>$val['QBO_dep_ac'],'QBO_gain_loss_ac' => $val['QBO_gain_loss_ac'],'dep_method' => $val['dep_method'],'default_life' => $val['default_life'],'company_id' => $val['company_id']);
                    $insert=DB::table($this->tbl_rules)->insert($values);
                } 
            }
           return redirect('/company-success');
        } else {
           return redirect('/company-success');
        }
        
    }

    // send invitation mail to user
    function sendinvitation(Request $request){
        $email = explode (",", $request->email); 
        foreach($email as $val){
            //echo $val;
            $company_count = DB::table($this->tbl_company_user)->where('user_email', '=', $val)->where('company_id', '=', $request->companyid)->get()->count();
            if($company_count>0){

            }
            else{
                $values = array('user_email' => $val,'company_id' => $request->companyid,'status' => 0);
                $insert=DB::table($this->tbl_company_user)->insert($values);
                $details = [
                    'company_name' => $request->company_name,
                    'companyid' => $request->companyid
                ];    
                \Mail::to($val)->send(new \App\Mail\SendInvite($details));
            }
            
           
        }
        
        return redirect('/invite-success');
    }
    

    //Company Register 
    function register(Request $req){
        $company_id = Session::get('realmid');
        if(empty($company_id)){
            return redirect('company-list');    
        }
        else{
            $user=DB::table($this->tbl_company)->where('company_id', $company_id)->get();
            if(!empty($user[0]->date_format)){
                return redirect('company-list');
            }
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
            DB::table($this->tbl_company)->where('company_id', $company_id)->update(['refresh_token' => $refreshTokenValue]);         
            $req->session()->put('accessToken',$Token);
            $req->session()->put('realmid',$user[0]->realmid);
            $company_id = Session::get('realmid');
            $companydata=DB::table($this->tbl_company)->where('company_id', $company_id)->get();
            $fa=DB::table($this->tbl_QBO_account)->where('company_id', $company_id)->where('classification', 'Asset')->where('account_type', 'Fixed Asset')->whereIn('account_subtype', array('DepletableAssets','FixedAssetComputers','FixedAssetCopiers','FixedAssetFurniture','FixedAssetPhone','FixedAssetPhotoVideo','FixedAssetSoftware','FixedAssetOtherToolsEquipment','FurnitureAndFixtures','Land','LeaseholdImprovements','OtherFixedAssets','Buildings','IntangibleAssets','MachineryAndEquipment','Vehicles','AssetsInCourseOfConstruction','CapitalWip','IntangibleAssetsUnderDevelopment','LandAsset','NonCurrentAssets','ParticipatingInterests','ProvisionsFixedAssets'))->get();
            $faother=DB::table($this->tbl_QBO_account)->where('company_id', $company_id)->where('classification', 'Asset')->whereNotIn('account_subtype', array('DepletableAssets','FixedAssetComputers','FixedAssetCopiers','FixedAssetFurniture','FixedAssetPhone','FixedAssetPhotoVideo','FixedAssetSoftware','FixedAssetOtherToolsEquipment','FurnitureAndFixtures','Land','LeaseholdImprovements','OtherFixedAssets','Buildings','IntangibleAssets','MachineryAndEquipment','Vehicles','AssetsInCourseOfConstruction','CapitalWip','IntangibleAssetsUnderDevelopment','LandAsset','NonCurrentAssets','ParticipatingInterests','ProvisionsFixedAssets'))->get();

            $other_expenses=DB::table($this->tbl_QBO_account)->where('company_id', $company_id)->where('classification', 'Expense')->where('account_type', 'Other Expense')->get();         
            
            $all_expenses=DB::table($this->tbl_QBO_account)->where('company_id', $company_id)->where('classification', 'Expense')->where('account_type', '!=' ,'Other Expense')->get();
            
            $accumulated_depreciation=DB::table($this->tbl_QBO_account)->where('company_id', $company_id)->where('account_subtype', 'AccumulatedDepletion')->where('company_id', $company_id)->orwhere('account_subtype','AccumulatedDepreciation')->where('company_id', $company_id)->orwhere('account_subtype','AccumulatedAmortization')->where('company_id', $company_id)->orwhere('account_subtype','CumulativeDepreciationOnIntangibleAssets')->get();
            
            //DB::enableQueryLog();
            $track_depreciation=DB::table($this->tbl_QBO_account)->where('company_id', $company_id)->where('account_subtype', 'Depreciation')->orwhere('company_id', $company_id)->where('account_subtype', 'Amortization')->get();
            //dd(DB::getQueryLog());
            $other_expenses_td=DB::table($this->tbl_QBO_account)->where('company_id', $company_id)->where('classification', 'Expense')->where('account_type', 'Other Expense')->where('account_subtype', '!=','Depreciation')->orwhere('account_subtype', '!=' , 'Amortization')->get();         
            
            $all_expenses_td=DB::table($this->tbl_QBO_account)->where('company_id', $company_id)->where('classification', 'Expense')->where('account_type', '!=' ,'Other Expense')->where('account_subtype', '!=' , 'Depreciation')->orwhere('account_subtype', '!=' , 'Amortization')->get();
            
            $track_gl=DB::table($this->tbl_QBO_account)->where('company_id', $company_id)->where('account_type', 'Other Income')->where('account_subtype', 'GainLossOnSaleOfFixedAssets')->where('company_id', $company_id)->where('account_type', 'Other Income')->orwhere('account_subtype', 'LossOnDisposalOfAssets')->get();

            $other_expenses_gl=DB::table($this->tbl_QBO_account)->where('company_id', $company_id)->where('classification', 'Expense')->where('account_type', 'Other Expense')->whereNotIn('account_subtype', array('GainLossOnSaleOfFixedAssets','LossOnDisposalOfAssets'))->get();         
            
            $all_expenses_gl=DB::table($this->tbl_QBO_account)->where('company_id', $company_id)->where('classification', 'Expense')->where('account_type', '!=' ,'Other Expense')->whereNotIn('account_subtype', array('GainLossOnSaleOfFixedAssets','LossOnDisposalOfAssets'))->get();

            //print_r($accumulated_depreciation);
            return view('auth.company-register',compact('fa','other_expenses','all_expenses','companydata','faother','accumulated_depreciation','track_gl','track_depreciation','other_expenses_gl','all_expenses_gl','other_expenses_td','all_expenses_td'));        
        }
        
    }

    // set company realid in session
    function setcompanydata($id,Request $req){
        $user=DB::table($this->tbl_company)->where('company_id', $id)->get();
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
        DB::table($this->tbl_company)->where('company_id', $id)->update(['refresh_token' => $refreshTokenValue]);
        $req->session()->put('accessToken',$Token);
        $req->session()->put('realmid',$user[0]->realmid);
        $req->session()->put('start_date',$user[0]->date_format);
        return redirect('/company-dashboard');
    }

    // company dashboard
    function dashboard(Request $req){
        $id = Session::get('realmid');
        $user=DB::table($this->tbl_company)->where('company_id', $id)->get();
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
        DB::table($this->tbl_company)->where('company_id', $id)->update(['refresh_token' => $refreshTokenValue]);
        $req->session()->put('accessToken',$Token);
        $req->session()->put('realmid',$user[0]->realmid);
        $company = DB::table($this->tbl_company)->where('company_id', '=', $id)->get();
        return view('company-dashboard',compact('company'));
    }


    function import(Request $request)
    {
        $this->validate($request, [
                'image-upload'  => 'required|mimes:xls,xlsx,csv'
            ],
            [
                'image-upload.required' => 'Upload file csv,xls,xlsx'
            ]
        );

        $path = $request->file('image-upload')->getRealPath();

        $data = Excel::import(new CompanyImport,request()->file('image-upload'));

        return redirect('company-dashboard');
    }

    function postje(Request $request){
        $companyid = Session::get('realmid');
        $curl = curl_init();
        curl_setopt_array($curl, array(
          CURLOPT_URL => $base_url.'/v3/company/'.$companyid.'/journalentry?minorversion=62',
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_ENCODING => '',
          CURLOPT_MAXREDIRS => 10,
          CURLOPT_TIMEOUT => 0,
          CURLOPT_FOLLOWLOCATION => true,
          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
          CURLOPT_CUSTOMREQUEST => 'POST',
          CURLOPT_POSTFIELDS =>'{
          "Line": [
            {
              "Id": "0",
              "Description": "nov portion of rider insurance",
              "Amount": 100.0,
              "DetailType": "JournalEntryLineDetail",
              "JournalEntryLineDetail": {
                "PostingType": "Debit",
                 "AccountRef": {
                        "value": "39",
                        "name": "Opening Bal Equity"
                      }
              }
            },
            {
              "Description": "nov portion of rider insurance",
              "Amount": 100.0,
              "DetailType": "JournalEntryLineDetail",
              "JournalEntryLineDetail": {
                "PostingType": "Credit",
                      "AccountRef": {
                        "value": "44",
                        "name": "Notes Payable"
                      }

              }
            }
          ]
        }',
          CURLOPT_HTTPHEADER => array(
            'Content-Type: application/json'
          ),
        ));
        $response = curl_exec($curl);
        curl_close($curl);
    }

}

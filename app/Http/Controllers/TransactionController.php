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
use QuickBooksOnline\API\DataService\DataService;

class TransactionController extends Controller
{
    private $tbl_company;
    private $tbl_users;
    private $tbl_transaction;
    private $tbl_rules;
    private $tbl_fa_depreciation;
    private $tbl_temp;
    public function __construct()
    {
        $this->tbl_company=env('TABLE_COMPANY');
        $this->tbl_users=env('TABLE_USERS');
        $this->tbl_transaction=env('TABLE_TRANSACTIONS');
        $this->tbl_rules=env('TABLE_RULES');
        $this->tbl_fa_depreciation=env('TABLE_FA_DS');
        $this->tbl_temp=env('TABLE_TEMP');
    }
    
    //Get all new transaction of company and save to database
    function transaction(Request $req){
        
        $company_id = Session::get('realmid');
        $user=DB::table($this->tbl_company)->where('company_id', $company_id)->get();
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
        $user_id = Session::get('id');
        $companyid = Session::get('realmid');
        $accessToken = Session::get('accessToken');
        $rules=DB::table($this->tbl_rules)->where('company_id', $company_id)->get();
        $data=array();
        $enddate=date('Y-m-d');
        $startdate=date('Y-m-d', strtotime('-1 year'));
        $startdate = Session::get('start_date');
        //dd(Session::all());
        //echo 'https://sandbox-quickbooks.api.intuit.com/v3/company/'.$companyid.'/reports/GeneralLedger?minorversion=62&start_date='.$startdate.'&end_date='.$enddate.'&account='.$values->QBO_FA_ac_id.'&columns=tx_date,name,memo,txn_type,doc_num,account_name,debt_amt,credit_amt,rbal_nat_amount,txnID';
        foreach($rules as $values){
            $curl = curl_init();
            curl_setopt_array($curl, array(
              CURLOPT_URL => 'https://sandbox-quickbooks.api.intuit.com/v3/company/'.$companyid.'/reports/GeneralLedger?minorversion=62&start_date='.$startdate.'&end_date='.$enddate.'&account='.$values->QBO_FA_ac_id.'&columns=tx_date,name,memo,txn_type,doc_num,account_name,debt_amt,credit_amt,rbal_nat_amount,txnID',
              CURLOPT_RETURNTRANSFER => true,
              CURLOPT_ENCODING => '',
              CURLOPT_MAXREDIRS => 10,
              CURLOPT_TIMEOUT => 0,
              CURLOPT_FOLLOWLOCATION => true,
              CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
              CURLOPT_CUSTOMREQUEST => 'GET',
              CURLOPT_HTTPHEADER => array(
                'User-Agent: QBOV3-OAuth2-Postman-Collection',
                'Accept: application/json',
                'Authorization: Bearer '.$accessToken
              ),
            ));
            $response = curl_exec($curl);
            $responses=json_decode($response);
            curl_close($curl);
            

            $dm=$values->dep_method;
            $ac=$values->asse_category;
            $dl=$values->default_life;
            if(!empty($responses->Rows->Row[0]->Rows->Row)){
                $i=1;
                foreach($responses->Rows->Row[0]->Rows->Row as $mydata){
                    
                    if(!empty($mydata->ColData[5]->value)){
                        $txndate=date('Ymd',strtotime($mydata->ColData[0]->value));
                        $txnDate=$mydata->ColData[0]->value;
                        $txntype=$mydata->ColData[1]->value;
                        $name=$mydata->ColData[3]->value;
                        $memo=$mydata->ColData[4]->value;
                        $accid=$mydata->ColData[5]->id;
                        $an=$mydata->ColData[5]->value;
                        if(!empty($mydata->ColData[6]->value)){
                            $debt_amt=$mydata->ColData[6]->value;
                        }
                        else{
                            $debt_amt=0.00;
                        }
                        if(!empty($mydata->ColData[7]->value)){
                            $credit_amt=$mydata->ColData[7]->value;
                        }
                        else{
                            $credit_amt=0.00;
                        }
                        
                        $txnid=$txndate.$txntype.$accid;
                        $txn_count = DB::table($this->tbl_transaction)->where('QBO_txn_id', '=', $txnid)->where('company_id', '=', $companyid)->get()->count();
                        if($txn_count>0){

                        }
                        else{
                            $values = array('QBO_txn_id' => $txnid,'is_txn_processed' => 0,'QBO_FA_ac_id' => $accid,'debt_amt' => $debt_amt,'credit_amt' => $credit_amt,'company_id' => $companyid,'txn_date' => $txnDate,'account_name' => $an,'txn_type' => $txntype,'memo' => $memo,'dep_method' => $dm,'default_life' => $dl,'name' => $name,'asset_category'=>$ac,'start_date'=>$txnDate);
                            $insert=DB::table($this->tbl_transaction)->insert($values);
                        }
                        

                    }
                    
                    // $data[]  =array('tx_date'=>$mydata->ColData[0],'txn_type'=>$mydata->ColData[1],'doc_num'=>$mydata->ColData[2],'name'=>$mydata->ColData[3],'memo'=>$mydata->ColData[4],'account_name'=>$mydata->ColData[5],'debt_amt'=>$mydata->ColData[6],'credit_amt'=>$mydata->ColData[7],'rbal_nat_amount'=>$mydata->ColData[8],'dep_method'=>$dm,'default_life'=>$dl);
                    $i++;
                }
            }
            if(!empty($responses->Rows->Row[0]->Rows->Row[0]->Rows->Row)){
                $i=1;
                foreach($responses->Rows->Row[0]->Rows->Row[0]->Rows->Row as $mydata){
                    
                    
                    if(!empty($mydata->ColData[5]->value)){
                        $txndate=date('Ymd',strtotime($mydata->ColData[0]->value));
                        $txnDate=$mydata->ColData[0]->value;
                        $txntype=$mydata->ColData[1]->value;
                        $name=$mydata->ColData[3]->value;
                        $memo=$mydata->ColData[4]->value;
                        $accid=$mydata->ColData[5]->id;
                        $an=$mydata->ColData[5]->value;
                        if(!empty($mydata->ColData[6]->value)){
                            $debt_amt=$mydata->ColData[6]->value;
                        }
                        else{
                            $debt_amt=0.00;
                        }
                        if(!empty($mydata->ColData[7]->value)){
                            $credit_amt=$mydata->ColData[7]->value;
                        }
                        else{
                            $credit_amt=0.00;
                        }
                        
                        $txnid=$txndate.$txntype.$accid;
                        $txn_count = DB::table($this->tbl_transaction)->where('QBO_txn_id', '=', $txnid)->where('company_id', '=', $companyid)->get()->count();
                        if($txn_count>0){

                        }
                        else{
                            $values = array('QBO_txn_id' => $txnid,'is_txn_processed' => 0,'QBO_FA_ac_id' => $accid,'debt_amt' => $debt_amt,'credit_amt' => $credit_amt,'company_id' => $companyid,'txn_date' => $txnDate,'account_name' => $an,'txn_type' => $txntype,'memo' => $memo,'dep_method' => $dm,'default_life' => $dl,'name' => $name,'asset_category'=>$ac,'start_date'=>$txnDate);
                            $insert=DB::table($this->tbl_transaction)->insert($values);
                        }
                        

                    }
                    
                    // $data[]  =array('tx_date'=>$mydata->ColData[0],'txn_type'=>$mydata->ColData[1],'doc_num'=>$mydata->ColData[2],'name'=>$mydata->ColData[3],'memo'=>$mydata->ColData[4],'account_name'=>$mydata->ColData[5],'debt_amt'=>$mydata->ColData[6],'credit_amt'=>$mydata->ColData[7],'rbal_nat_amount'=>$mydata->ColData[8],'dep_method'=>$dm,'default_life'=>$dl);
                    $i++;
                }
            }
        }
        $new = DB::table($this->tbl_transaction)->where('company_id', '=', $companyid)->where('is_txn_processed', '=', 0)->get();
        $processed = DB::table($this->tbl_transaction)->where('company_id', '=', $companyid)->where('is_txn_processed', '=', 1)->get();
        $ignored = DB::table($this->tbl_transaction)->where('company_id', '=', $companyid)->where('is_txn_processed', '=', 2)->get();
        $historical = DB::table($this->tbl_transaction)->where('company_id', '=', $companyid)->where('is_txn_processed', '=', 4)->get();
        $com=DB::table($this->tbl_company)->where('company_id', $company_id)->get();
        $decimal=$com[0]->decimal_round;
        return view('transactions', compact('new','processed','ignored','historical','decimal'));    
    }

    //Ignore Transaction
    function ignored($id){
        $finalResult = DB::table($this->tbl_transaction)->where('asset_key', $id)->update(['is_txn_processed' => 2]);
        return redirect('transactions');
    }

    //edit Transaction
    function edit($id){
        $data = DB::table($this->tbl_transaction)->where('asset_key', $id)->get();

        return view('edittransactions', compact('data'));
    }
    //update Transaction
    function update(Request $request,$id){
        $finalResult = DB::table($this->tbl_transaction)->where('asset_key', $id)
        ->update([
            'asset_category' => $request->input('asset_category'),
            'dep_method' => $request->input('dep_method'),
            'default_life' => $request->input('default_life'),
            'salvage_value' => $request->input('salvage_value'),
            'warrenty_end_date' => $request->input('warrenty_end_date'),
            'serial_number' => $request->input('serial_number'),
            'warrenty_details' => $request->input('warrenty_details'),
            'start_date' => $request->input('start_date'),
            'other_memo' => $request->input('other_memo')
        ]);
        return redirect('transactions');
    }

    //Process Transaction
    function process(Request $request){
        
        $id=$request->input('id');
        $companyid = Session::get('realmid');
        if(!empty($id)){
            foreach($id as $value){
                $company = DB::table($this->tbl_company)->where('company_id', $companyid)->get();
                $finalResult = DB::table($this->tbl_transaction)->where('asset_key', $value)->update(['is_txn_processed' => 1]);
                $getdata = DB::table($this->tbl_transaction)->where('asset_key', $value)->get();
                $method         = $company[0]->date_format;
                $method         = $company[0]->first_month_depreciation_method;
                $amount         = $getdata[0]->debt_amt;
                $purchase_date  = $getdata[0]->txn_date;
                $start_date     = $getdata[0]->start_date;
                $life           = $getdata[0]->default_life;
                $salvage_value  = $getdata[0]->salvage_value;
                if($method == 'Pro-Rate') {
                    $days=date('t');
                    $salvage_value;
                    if(!empty($salvage_value) && $salvage_value>0){
                        $totalamount = $amount;
                        $finalamount =$amount-$amount*$salvage_value/100;
                        $sv = $salvage_value;
                    }
                    else{
                        $sv = 0;
                        $finalamount = $amount;
                    }
                    $curday = date('j',strtotime($purchase_date));
                    $finaldays=$days-$curday;
                    $count = DB::table($this->tbl_temp)->where('asset_key', $value)->get()->count();
                    $finalcount=$life+1;
                    if($finalcount>=$count){   
                        for($x = 0; $x <$finalcount; $x++){
                            $count = DB::table($this->tbl_temp)->where('asset_key', $value)->get()->count();    
                            if($x == 0){
                                $date=date('Y-m-d');
                                $curdate=date("Y-m-t", strtotime($start_date));    
                            }
                            else{
                                $date=date('Y-m-d');
                                $curdate=date("Y-m-t", strtotime("+".$x." months", strtotime($start_date)));       
                            }
                            
                            if($count>0 && $count<$life){
                                $famount = $finalamount/$life;
                                $db1=DB::table($this->tbl_temp)->where('asset_key', $value)->orderBy('id', 'desc')->limit(1)->get();
                                $closingbalance=$db1[0]->closing_bal - $famount;
                                $opening_bal=$db1[0]->closing_bal;
                                $values  = array('asset_key' =>$value,'month' => $curdate,'opening_bal' => $opening_bal,'closing_bal' => $closingbalance,'period_dep' => $famount);
                                $insert=DB::table($this->tbl_temp)->insert($values);  
                            }
                            elseif($count == $life) {
                                $db=DB::table($this->tbl_temp)->where('asset_key', $value)->orderBy('id', 'desc')->limit(1)->get();
                                $damount=$finalamount/$life;
                                $famount = $db[0]->closing_bal;
                                $db1=DB::table($this->tbl_temp)->where('asset_key', $value)->orderBy('id', 'desc')->limit(1)->get();
                                $closingbalance=$db1[0]->closing_bal - $famount;
                                $opening_bal=$db1[0]->closing_bal;
                                $values  = array('asset_key' =>$value,'month' => $curdate,'opening_bal' => $opening_bal,'closing_bal' => $closingbalance,'period_dep' => $famount);
                                $insert=DB::table($this->tbl_temp)->insert($values);  
                            }   
                            else{
                                $damount=$finalamount/$life;
                                $famount = $damount*$finaldays/$days;
                                $closingbalance=$finalamount-abs($famount);
                                $values  = array('asset_key' =>$value,'month' => $curdate,'opening_bal' => $amount,'closing_bal' => $closingbalance,'period_dep' => abs($famount));
                                $insert=DB::table($this->tbl_temp)->insert($values);
                            }
                            
                        }
                    } 
                }

                if($method == 'Half-Month') {
                    $days=date('t');
                    $salvage_value;
                    if(!empty($salvage_value) && $salvage_value>0){
                        $totalamount = $amount;
                        $finalamount =$amount-$amount*$salvage_value/100;
                        $sv = $salvage_value;
                    }
                    else{
                        $sv = 0;
                        $finalamount = $amount;
                    }
                    $curday = date('j',strtotime($purchase_date));
                    $finaldays=$days-$curday;
                    $count = DB::table($this->tbl_temp)->where('asset_key', $value)->get()->count();
                    $finalcount=$life+1;
                    if($finalcount>=$count){
                        for($x = 0; $x <$finalcount; $x++){
                            $count = DB::table($this->tbl_temp)->where('asset_key', $value)->get()->count();    
                            if($x == 0){
                                $date=date('Y-m-d');
                                $curdate=date("Y-m-t", strtotime($date));    
                            }
                            else{
                                $date=date('Y-m-d');
                                $curdate=date("Y-m-t", strtotime("+".$x." months", strtotime($date)));       
                            }
                            if($count>0  && $count<$life){
                                $famount = $finalamount/$life;
                                $db1=DB::table($this->tbl_temp)->where('asset_key', $value)->orderBy('id', 'desc')->limit(1)->get();
                                $closingbalance=$db1[0]->closing_bal - $famount;
                                $opening_bal=$db1[0]->closing_bal;
                                $values  = array('asset_key' =>$value,'month' => $curdate,'opening_bal' => $opening_bal,'closing_bal' => $closingbalance,'period_dep' => $famount);
                                $insert=DB::table($this->tbl_temp)->insert($values);  
                            }
                            elseif($count == $life) {
                                $db=DB::table($this->tbl_temp)->where('asset_key', $value)->orderBy('id', 'desc')->limit(1)->get();
                                $damount=$finalamount/$life;
                                $famount = $damount/2;
                                $db1=DB::table($this->tbl_temp)->where('asset_key', $value)->orderBy('id', 'desc')->limit(1)->get();
                                $closingbalance=$db1[0]->closing_bal - $famount;
                                $opening_bal=$db1[0]->closing_bal;
                                $values  = array('asset_key' =>$value,'month' => $curdate,'opening_bal' => $opening_bal,'closing_bal' => $closingbalance,'period_dep' => $famount);
                                $insert=DB::table($this->tbl_temp)->insert($values);  
                            }   
                            else{
                                $damount=$finalamount/$life;
                                $famount = $damount/2;
                                $closingbalance=$finalamount-abs($famount);
                                $values  = array('asset_key' =>$value,'month' => $curdate,'opening_bal' => $amount,'closing_bal' => $closingbalance,'period_dep' => abs($famount));
                                $insert=DB::table($this->tbl_temp)->insert($values);
                            }
                            
                        }
                    }
                }


                if($method == 'First 15 Days Full Month') {
                    $days=date('t');
                    $salvage_value;
                    if(!empty($salvage_value) && $salvage_value>0){
                        $totalamount = $amount;
                        $finalamount =$amount-$amount*$salvage_value/100;
                        $sv = $salvage_value;
                    }
                    else{
                        $sv = 0;
                        $finalamount = $amount;
                    }
                    $curday = date('j',strtotime($purchase_date));
                    $finaldays=$days-$curday;
                    $count = DB::table($this->tbl_temp)->where('asset_key', $value)->get()->count();
                    $finalcount=$life+1;
                    if($finalcount>$count){
                        for($x = 0; $x <$finalcount; $x++){
                            $count = DB::table($this->tbl_temp)->where('asset_key', $value)->get()->count();    
                            if($x == 0){
                                $date=date('Y-m-d');
                                $curdate=date("Y-m-t", strtotime($date));    
                            }
                            else{
                                $date=date('Y-m-d');
                                $curdate=date("Y-m-t", strtotime("+".$x." months", strtotime($date)));       
                            }
                            if($count>0  && $count<$life){
                                $famount = $finalamount/$life;
                                $db1=DB::table($this->tbl_temp)->where('asset_key', $value)->orderBy('id', 'desc')->limit(1)->get();
                                $closingbalance=$db1[0]->closing_bal - $famount;
                                $opening_bal=$db1[0]->closing_bal;
                                $values  = array('asset_key' =>$value,'month' => $curdate,'opening_bal' => $opening_bal,'closing_bal' => $closingbalance,'period_dep' => $famount);
                                $insert=DB::table($this->tbl_temp)->insert($values);  
                            }
                            elseif($count == $life) {
                                $db=DB::table($this->tbl_temp)->where('asset_key', $value)->orderBy('id', 'asc')->limit(1)->get();
                                $damount=$finalamount/$life;
                                $famount = $damount/2;
                                $db1=DB::table($this->tbl_temp)->where('asset_key', $value)->orderBy('id', 'desc')->limit(1)->get();
                                $closingbalance=$db1[0]->closing_bal - $famount;
                                $opening_bal=$db1[0]->closing_bal;
                                $values  = array('asset_key' =>$value,'month' => $curdate,'opening_bal' => $opening_bal,'closing_bal' => $closingbalance,'period_dep' => $famount);
                                $insert=DB::table($this->tbl_temp)->insert($values); 
                            }   
                            else{
                                if($curday<=15){
                                    $damount=$finalamount/$life;
                                    $famount = $damount;  
                                    $closingbalance=$finalamount-abs($famount);
                                    $values  = array('asset_key' =>$value,'month' => $curdate,'opening_bal' => $amount,'closing_bal' => $closingbalance,'period_dep' => abs($famount));
                                    $insert=DB::table($this->tbl_temp)->insert($values);  
                                }
                                else{
                                    $damount=$finalamount/$life;
                                    $famount = 0;
                                    $closingbalance=$finalamount-abs($famount);
                                    $values  = array('asset_key' =>$value,'month' => $curdate,'opening_bal' => $amount,'closing_bal' => $closingbalance,'period_dep' => abs($famount));
                                    $insert=DB::table($this->tbl_temp)->insert($values);
                                }
                                
                            }
                        }
                        
                    }
                }


            }
        }
        return redirect('transactions');
    }

    //Ignore to new Transaction
    function new($id){
        $finalResult = DB::table($this->tbl_transaction)->where('asset_key', $id)->update(['is_txn_processed' => 0]);
        return redirect('transactions');
    }   

    //Get data for fixed asset register
    function fixed_asset_register(){
        $company_id = Session::get('realmid');
        $company=DB::table($this->tbl_company)->where('company_id', $company_id)->get();
        $group=DB::table($this->tbl_transaction)->where('company_id', $company_id)->where('is_txn_processed', 1)->groupBy('asset_category')->get();
        
        $list=array();
        $final=array();
        foreach($group as $grp){
            $transaction=DB::table($this->tbl_transaction)->where('company_id', $company_id)->where('is_txn_processed', 1)->where('asset_category', $grp->asset_category)->get();
            $final=array();
            $total=array();
            foreach($transaction as $tran){
                
                $Fa=DB::table($this->tbl_fa_depreciation)->where('asset_key', $tran->asset_key)->whereMonth('month', date('m'))->first();
                $count=DB::table($this->tbl_fa_depreciation)->where('asset_key', $tran->asset_key)->get()->count();
                $famount = '';
                $first   ='';
                $second  = '';
                $third   = '';
                $fourth  = '';
                $fifth   = '';
                $sixth   = '';
                $seventh = '';
                $eigth   = '';
                $nine    = '';
                $ten     = '';
                $eleven  = '';
                $twelve  = '';
                $life    = $tran->default_life+1;
                $finallife=$tran->default_life;
                
                $year=date('Y');
                $decimal=$company[0]->decimal_round;
                $first=DB::table($this->tbl_temp)->where('asset_key', $tran->asset_key)->whereMonth('month', '01')->whereYear('month', '=', $year)->first();
                if(!empty($first)){
                    if($decimal == 0){
                        $first = round($first->period_dep);
                    }
                    if($decimal == 1){
                        $first = number_format($first->period_dep,1);
                    }
                    if($decimal == 2){
                        $first = number_format($first->period_dep,2);
                    }

                }
                else{
                    if($decimal == 0){
                        $first = 0;   
                    }
                    if($decimal == 1){
                        $first = 0.0;   
                    }
                    if($decimal == 2){
                        $first = 0.00;   
                    }
                    
                }

                $second=DB::table($this->tbl_temp)->where('asset_key', $tran->asset_key)->whereMonth('month', '02')->whereYear('month', '=', $year)->first();
                if(!empty($second)){
                    if($decimal == 0){
                        $second = round($second->period_dep);
                    }
                    if($decimal == 1){
                        $second = number_format($second->period_dep,1);
                    }
                    if($decimal == 2){
                        $second = number_format($second->period_dep,2);
                    }
                    
                }
                else{
                    if($decimal == 0){
                        $second = 0;
                    }
                    if($decimal == 1){
                        $second = 0.0;
                    }
                    if($decimal == 2){
                        $second = 0.00;
                    }
                    
                }

                $third=DB::table($this->tbl_temp)->where('asset_key', $tran->asset_key)->whereMonth('month', '03')->whereYear('month', '=', $year)->first();
                if(!empty($third)){
                    
                    if($decimal == 0){
                        $third = round($third->period_dep);
                    }
                    if($decimal == 1){
                        $third = number_format($third->period_dep,1);
                    }
                    if($decimal == 2){
                        $third = number_format($third->period_dep,2);
                    }
                }
                else{
                    if($decimal == 0){
                        $third = 0;
                    }
                    if($decimal == 1){
                        $third = 0.0;
                    }
                    if($decimal == 2){
                        $third = 0.00;
                    }  
                }

                $fourth=DB::table($this->tbl_temp)->where('asset_key', $tran->asset_key)->whereMonth('month', '04')->whereYear('month', '=', $year)->first();
                if(!empty($fourth)){
                    if($decimal == 0){
                        $fourth = round($fourth->period_dep);
                    }
                    if($decimal == 1){
                        $fourth = number_format($fourth->period_dep,1);
                    }
                    if($decimal == 2){
                        $fourth = number_format($fourth->period_dep,2);
                    }
                }
                else{
                    if($decimal == 0){
                        $fourth = 0;
                    }
                    if($decimal == 1){
                        $fourth = 0.0;
                    }
                    if($decimal == 2){
                        $fourth = 0.00;
                    }
                }

                $fifth=DB::table($this->tbl_temp)->where('asset_key', $tran->asset_key)->whereMonth('month', '05')->whereYear('month', '=', $year)->first();
                if(!empty($fifth)){
                    
                    if($decimal == 0){
                        $fifth = round($fifth->period_dep);
                    }
                    if($decimal == 1){
                        $fifth = number_format($fifth->period_dep,1);
                    }
                    if($decimal == 2){
                        $fifth = number_format($fifth->period_dep,2);
                    }
                }
                else{
                    if($decimal == 0){
                        $fifth = 0;
                    }
                    if($decimal == 1){
                        $fifth = 0.0;
                    }
                    if($decimal == 2){
                        $fifth = 0.00;
                    }
                }

                $sixth=DB::table($this->tbl_temp)->where('asset_key', $tran->asset_key)->whereMonth('month', '06')->whereYear('month', '=', $year)->first();
                if(!empty($sixth)){
                    if($decimal == 0){
                        $sixth = round($sixth->period_dep);
                    }
                    if($decimal == 1){
                        $sixth = number_format($sixth->period_dep,1);
                    }
                    if($decimal == 2){
                        $sixth = number_format($sixth->period_dep,2);
                    }
                }
                else{
                    if($decimal == 0){
                        $sixth = 0;
                    }
                    if($decimal == 1){
                        $sixth = 0.0;
                    }
                    if($decimal == 2){
                        $sixth = 0.00;
                    }
                }

                $seventh=DB::table($this->tbl_temp)->where('asset_key', $tran->asset_key)->whereMonth('month', '07')->whereYear('month', '=', $year)->first();
                if(!empty($seventh)){
                    if($decimal == 0){
                        $seventh = round($seventh->period_dep);
                    }
                    if($decimal == 1){
                        $seventh = number_format($seventh->period_dep,1);
                    }
                    if($decimal == 2){
                        $seventh = number_format($seventh->period_dep,2);
                    }
                }
                else{
                    if($decimal == 0){
                        $seventh = 0;
                    }
                    if($decimal == 1){
                        $seventh = 0.0;
                    }
                    if($decimal == 2){
                        $seventh = 0.00;
                    }
                }

                $eigth=DB::table($this->tbl_temp)->where('asset_key', $tran->asset_key)->whereMonth('month', '08')->whereYear('month', '=', $year)->first();
                if(!empty($eigth)){
                    if($decimal == 0){
                        $eigth = round($eigth->period_dep);
                    }
                    if($decimal == 1){
                        $eigth = number_format($eigth->period_dep,1);
                    }
                    if($decimal == 2){
                        $eigth = number_format($eigth->period_dep,2);
                    }
                }
                else{
                    if($decimal == 0){
                        $eigth = 0;
                    }
                    if($decimal == 1){
                        $eigth = 0.0;
                    }
                    if($decimal == 2){
                        $eigth = 0.00;
                    }
                }

                $nine=DB::table($this->tbl_temp)->where('asset_key', $tran->asset_key)->whereMonth('month', '09')->whereYear('month', '=', $year)->first();
                if(!empty($nine)){
                    if($decimal == 0){
                        $nine = round($nine->period_dep);
                    }
                    if($decimal == 1){
                        $nine = number_format($nine->period_dep,1);
                    }
                    if($decimal == 2){
                        $nine = number_format($nine->period_dep,2);
                    }
                }
                else{
                    if($decimal == 0){
                        $nine = 0;
                    }
                    if($decimal == 1){
                        $nine = 0.0;
                    }
                    if($decimal == 2){
                        $nine = 0.00;
                    }
                }

                $ten=DB::table($this->tbl_temp)->where('asset_key', $tran->asset_key)->whereMonth('month', '10')->whereYear('month', '=', $year)->first();
                if(!empty($ten)){
                    if($decimal == 0){
                        $ten = round($ten->period_dep);
                    }
                    if($decimal == 1){
                        $ten = number_format($ten->period_dep,1);
                    }
                    if($decimal == 2){
                        $ten = number_format($ten->period_dep,2);
                    }
                }
                else{
                    if($decimal == 0){
                        $ten = 0;
                    }
                    if($decimal == 1){
                        $ten = 0.0;
                    }
                    if($decimal == 2){
                        $ten = 0.00;
                    }
                }

                $eleven=DB::table($this->tbl_temp)->where('asset_key', $tran->asset_key)->whereMonth('month', '11')->whereYear('month', '=', $year)->first();
                if(!empty($eleven)){
                    if($decimal == 0){
                        $eleven = round($eleven->period_dep);
                    }
                    if($decimal == 1){
                        $eleven = number_format($eleven->period_dep,1);
                    }
                    if($decimal == 2){
                        $eleven = number_format($eleven->period_dep,2);
                    }
                }
                else{
                    if($decimal == 0){
                        $eleven = 0;
                    }
                    if($decimal == 1){
                        $eleven = 0.0;
                    }
                    if($decimal == 2){
                        $eleven = 0.00;
                    }
                }

                $twelve=DB::table($this->tbl_temp)->where('asset_key', $tran->asset_key)->whereMonth('month', '12')->whereYear('month', '=', $year)->first();
                if(!empty($twelve)){
                    if($decimal == 0){
                        $twelve = round($twelve->period_dep);
                    }
                    if($decimal == 1){
                        $twelve = number_format($twelve->period_dep,1);
                    }
                    if($decimal == 2){
                        $twelve = number_format($twelve->period_dep,2);
                    }
                }
                else{
                    if($decimal == 0){
                        $twelve = 0;
                    }
                    if($decimal == 1){
                        $twelve = 0.0;
                    }
                    if($decimal == 2){
                        $twelve = 0.00;
                    }
                }



                if($decimal == 0){
                    $pp = round($tran->debt_amt);
                }
                if($decimal == 1){
                    $pp = round($tran->debt_amt,1);
                }
                if($decimal == 2){
                    $pp = round($tran->debt_amt,2);
                }

                $final[]=array('asset_category' => $tran->asset_category,'name'=>$tran->name,'purchase_price'=>$pp,'date'=>$company[0]->date_format,'first'=>$first,'second'=>$second,'third'=>$third,'fourth'=>$fourth,'fifth'=>$fifth,'sixth'=>$sixth,'seventh'=>$seventh,'eigth'=>$eigth,'nine'=>$nine,'ten'=>$ten,'eleven'=>$eleven,'twelve'=>$twelve,'life'=>$finallife,'asset_key'=>$tran->asset_key,'start_date'=>$tran->start_date,'txn_date'=>$tran->txn_date);
                $total[]=array('first'=>$first,'second'=>$second,'third'=>$third,'fourth'=>$fourth,'fifth'=>$fifth,'sixth'=>$sixth,'seventh'=>$seventh,'eigth'=>$eigth,'nine'=>$nine,'ten'=>$ten,'eleven'=>$eleven,'twelve'=>$twelve);
            }
            $sumArray = array();

            $key = 'first';
            $sum1 = array_sum(array_column($total,$key));
            if($decimal == 0){
                $sum1 = round($sum1);
            }
            if($decimal == 1){
                $sum1 = number_format($sum1,1);
            }
            if($decimal == 2){
                $sum1 = number_format($sum1,2);
            }
            $key = 'second';
            $sum2 = array_sum(array_column($total,$key));

            $key = 'third';
            $sum3 = array_sum(array_column($total,$key));

            $key = 'fourth';
            $sum4 = array_sum(array_column($total,$key));

            $key = 'fifth';
            $sum5 = array_sum(array_column($total,$key));

            $key = 'sixth';
            $sum6 = array_sum(array_column($total,$key));

            $key = 'seventh';
            $sum7 = array_sum(array_column($total,$key));

            $key = 'eigth';
            $sum8 = array_sum(array_column($total,$key));

            $key = 'nine';
            $sum9 = array_sum(array_column($total,$key));

            $key = 'ten';
            $sum10 = array_sum(array_column($total,$key));

            $key = 'eleven';
            $sum11 = array_sum(array_column($total,$key));

            $key = 'twelve';
            $sum12 = array_sum(array_column($total,$key));

            $key = 'purchase_price';
            $pp = array_sum(array_column($final,$key));
            if($decimal == 0){
                $pp = round($pp);
            }
            if($decimal == 1){
                $pp = number_format($pp,1);
            }
            if($decimal == 2){
                $pp = number_format($pp,2);
            }
            $list[]=array('asset_category' => $grp->asset_category,'purchase_price'=>$pp,'final'=>$final,'first'=>$sum1,'second'=>$sum2,'third'=>$sum3,'fourth'=>$sum4,'fifth'=>$sum5,'sixth'=>$sum6,'seventh'=>$sum7,'eigth'=>$sum8,'nine'=>$sum9,'ten'=>$sum10,'eleven'=>$sum11,'twelve'=>$sum12);
        }
        // echo '<pre>';
        // echo print_r($list);
        // echo '</pre>';
        // exit();
        return view('fixed_asset_register' , compact('company','final','list'));
    }

    //Search Get data for fixed asset register
    // function fixed_asset_search(Request $request){
    //     $start_date=date('Y',strtotime($request->input('start_date')));
    //     $company_id = Session::get('realmid');
    //     $company=DB::table($this->tbl_company)->where('company_id', $company_id)->get();
    //     $group=DB::table($this->tbl_transaction)->where('company_id', $company_id)->where('is_txn_processed', 1)->whereYear('start_date', $start_date)->groupBy('asset_category')->get();
        
    //     $list=array();
    //     $final=array();
    //     foreach($group as $grp){
    //         $transaction=DB::table($this->tbl_transaction)->where('company_id', $company_id)->where('is_txn_processed', 1)->where('asset_category', $grp->asset_category)->get();
    //         $final=array();
    //         $total=array();
    //         foreach($transaction as $tran){
                
    //             $Fa=DB::table($this->tbl_fa_depreciation)->where('asset_key', $tran->asset_key)->whereMonth('month', date('m'))->first();
    //             $count=DB::table($this->tbl_fa_depreciation)->where('asset_key', $tran->asset_key)->get()->count();
    //             $famount = '';
    //             $first   ='';
    //             $second  = '';
    //             $third   = '';
    //             $fourth  = '';
    //             $fifth   = '';
    //             $sixth   = '';
    //             $seventh = '';
    //             $eigth   = '';
    //             $nine    = '';
    //             $ten     = '';
    //             $eleven  = '';
    //             $twelve  = '';
    //             $life    = $tran->default_life+1;
    //             $finallife=$tran->default_life;
                
    //             $year=date('Y');
    //             $decimal=$company[0]->decimal_round;
    //             $first=DB::table($this->tbl_temp)->where('asset_key', $tran->asset_key)->whereMonth('month', '01')->whereYear('month', '=', $year)->first();
    //             if(!empty($first)){
    //                 if($decimal == 0){
    //                     $first = round($first->period_dep);
    //                 }
    //                 if($decimal == 1){
    //                     $first = number_format($first->period_dep,1);
    //                 }
    //                 if($decimal == 2){
    //                     $first = number_format($first->period_dep,2);
    //                 }

    //             }
    //             else{
    //                 if($decimal == 0){
    //                     $first = 0;   
    //                 }
    //                 if($decimal == 1){
    //                     $first = 0.0;   
    //                 }
    //                 if($decimal == 2){
    //                     $first = 0.00;   
    //                 }
                    
    //             }

    //             $second=DB::table($this->tbl_temp)->where('asset_key', $tran->asset_key)->whereMonth('month', '02')->whereYear('month', '=', $year)->first();
    //             if(!empty($second)){
    //                 if($decimal == 0){
    //                     $second = round($second->period_dep);
    //                 }
    //                 if($decimal == 1){
    //                     $second = number_format($second->period_dep,1);
    //                 }
    //                 if($decimal == 2){
    //                     $second = number_format($second->period_dep,2);
    //                 }
                    
    //             }
    //             else{
    //                 if($decimal == 0){
    //                     $second = 0;
    //                 }
    //                 if($decimal == 1){
    //                     $second = 0.0;
    //                 }
    //                 if($decimal == 2){
    //                     $second = 0.00;
    //                 }
                    
    //             }

    //             $third=DB::table($this->tbl_temp)->where('asset_key', $tran->asset_key)->whereMonth('month', '03')->whereYear('month', '=', $year)->first();
    //             if(!empty($third)){
                    
    //                 if($decimal == 0){
    //                     $third = round($third->period_dep);
    //                 }
    //                 if($decimal == 1){
    //                     $third = number_format($third->period_dep,1);
    //                 }
    //                 if($decimal == 2){
    //                     $third = number_format($third->period_dep,2);
    //                 }
    //             }
    //             else{
    //                 if($decimal == 0){
    //                     $third = 0;
    //                 }
    //                 if($decimal == 1){
    //                     $third = 0.0;
    //                 }
    //                 if($decimal == 2){
    //                     $third = 0.00;
    //                 }  
    //             }

    //             $fourth=DB::table($this->tbl_temp)->where('asset_key', $tran->asset_key)->whereMonth('month', '04')->whereYear('month', '=', $year)->first();
    //             if(!empty($fourth)){
    //                 if($decimal == 0){
    //                     $fourth = round($fourth->period_dep);
    //                 }
    //                 if($decimal == 1){
    //                     $fourth = number_format($fourth->period_dep,1);
    //                 }
    //                 if($decimal == 2){
    //                     $fourth = number_format($fourth->period_dep,2);
    //                 }
    //             }
    //             else{
    //                 if($decimal == 0){
    //                     $fourth = 0;
    //                 }
    //                 if($decimal == 1){
    //                     $fourth = 0.0;
    //                 }
    //                 if($decimal == 2){
    //                     $fourth = 0.00;
    //                 }
    //             }

    //             $fifth=DB::table($this->tbl_temp)->where('asset_key', $tran->asset_key)->whereMonth('month', '05')->whereYear('month', '=', $year)->first();
    //             if(!empty($fifth)){
                    
    //                 if($decimal == 0){
    //                     $fifth = round($fifth->period_dep);
    //                 }
    //                 if($decimal == 1){
    //                     $fifth = number_format($fifth->period_dep,1);
    //                 }
    //                 if($decimal == 2){
    //                     $fifth = number_format($fifth->period_dep,2);
    //                 }
    //             }
    //             else{
    //                 if($decimal == 0){
    //                     $fifth = 0;
    //                 }
    //                 if($decimal == 1){
    //                     $fifth = 0.0;
    //                 }
    //                 if($decimal == 2){
    //                     $fifth = 0.00;
    //                 }
    //             }

    //             $sixth=DB::table($this->tbl_temp)->where('asset_key', $tran->asset_key)->whereMonth('month', '06')->whereYear('month', '=', $year)->first();
    //             if(!empty($sixth)){
    //                 if($decimal == 0){
    //                     $sixth = round($sixth->period_dep);
    //                 }
    //                 if($decimal == 1){
    //                     $sixth = number_format($sixth->period_dep,1);
    //                 }
    //                 if($decimal == 2){
    //                     $sixth = number_format($sixth->period_dep,2);
    //                 }
    //             }
    //             else{
    //                 if($decimal == 0){
    //                     $sixth = 0;
    //                 }
    //                 if($decimal == 1){
    //                     $sixth = 0.0;
    //                 }
    //                 if($decimal == 2){
    //                     $sixth = 0.00;
    //                 }
    //             }

    //             $seventh=DB::table($this->tbl_temp)->where('asset_key', $tran->asset_key)->whereMonth('month', '07')->whereYear('month', '=', $year)->first();
    //             if(!empty($seventh)){
    //                 if($decimal == 0){
    //                     $seventh = round($seventh->period_dep);
    //                 }
    //                 if($decimal == 1){
    //                     $seventh = number_format($seventh->period_dep,1);
    //                 }
    //                 if($decimal == 2){
    //                     $seventh = number_format($seventh->period_dep,2);
    //                 }
    //             }
    //             else{
    //                 if($decimal == 0){
    //                     $seventh = 0;
    //                 }
    //                 if($decimal == 1){
    //                     $seventh = 0.0;
    //                 }
    //                 if($decimal == 2){
    //                     $seventh = 0.00;
    //                 }
    //             }

    //             $eigth=DB::table($this->tbl_temp)->where('asset_key', $tran->asset_key)->whereMonth('month', '08')->whereYear('month', '=', $year)->first();
    //             if(!empty($eigth)){
    //                 if($decimal == 0){
    //                     $eigth = round($eigth->period_dep);
    //                 }
    //                 if($decimal == 1){
    //                     $eigth = number_format($eigth->period_dep,1);
    //                 }
    //                 if($decimal == 2){
    //                     $eigth = number_format($eigth->period_dep,2);
    //                 }
    //             }
    //             else{
    //                 if($decimal == 0){
    //                     $eigth = 0;
    //                 }
    //                 if($decimal == 1){
    //                     $eigth = 0.0;
    //                 }
    //                 if($decimal == 2){
    //                     $eigth = 0.00;
    //                 }
    //             }

    //             $nine=DB::table($this->tbl_temp)->where('asset_key', $tran->asset_key)->whereMonth('month', '09')->whereYear('month', '=', $year)->first();
    //             if(!empty($nine)){
    //                 if($decimal == 0){
    //                     $nine = round($nine->period_dep);
    //                 }
    //                 if($decimal == 1){
    //                     $nine = number_format($nine->period_dep,1);
    //                 }
    //                 if($decimal == 2){
    //                     $nine = number_format($nine->period_dep,2);
    //                 }
    //             }
    //             else{
    //                 if($decimal == 0){
    //                     $nine = 0;
    //                 }
    //                 if($decimal == 1){
    //                     $nine = 0.0;
    //                 }
    //                 if($decimal == 2){
    //                     $nine = 0.00;
    //                 }
    //             }

    //             $ten=DB::table($this->tbl_temp)->where('asset_key', $tran->asset_key)->whereMonth('month', '10')->whereYear('month', '=', $year)->first();
    //             if(!empty($ten)){
    //                 if($decimal == 0){
    //                     $ten = round($ten->period_dep);
    //                 }
    //                 if($decimal == 1){
    //                     $ten = number_format($ten->period_dep,1);
    //                 }
    //                 if($decimal == 2){
    //                     $ten = number_format($ten->period_dep,2);
    //                 }
    //             }
    //             else{
    //                 if($decimal == 0){
    //                     $ten = 0;
    //                 }
    //                 if($decimal == 1){
    //                     $ten = 0.0;
    //                 }
    //                 if($decimal == 2){
    //                     $ten = 0.00;
    //                 }
    //             }

    //             $eleven=DB::table($this->tbl_temp)->where('asset_key', $tran->asset_key)->whereMonth('month', '11')->whereYear('month', '=', $year)->first();
    //             if(!empty($eleven)){
    //                 if($decimal == 0){
    //                     $eleven = round($eleven->period_dep);
    //                 }
    //                 if($decimal == 1){
    //                     $eleven = number_format($eleven->period_dep,1);
    //                 }
    //                 if($decimal == 2){
    //                     $eleven = number_format($eleven->period_dep,2);
    //                 }
    //             }
    //             else{
    //                 if($decimal == 0){
    //                     $eleven = 0;
    //                 }
    //                 if($decimal == 1){
    //                     $eleven = 0.0;
    //                 }
    //                 if($decimal == 2){
    //                     $eleven = 0.00;
    //                 }
    //             }

    //             $twelve=DB::table($this->tbl_temp)->where('asset_key', $tran->asset_key)->whereMonth('month', '12')->whereYear('month', '=', $year)->first();
    //             if(!empty($twelve)){
    //                 if($decimal == 0){
    //                     $twelve = round($twelve->period_dep);
    //                 }
    //                 if($decimal == 1){
    //                     $twelve = number_format($twelve->period_dep,1);
    //                 }
    //                 if($decimal == 2){
    //                     $twelve = number_format($twelve->period_dep,2);
    //                 }
    //             }
    //             else{
    //                 if($decimal == 0){
    //                     $twelve = 0;
    //                 }
    //                 if($decimal == 1){
    //                     $twelve = 0.0;
    //                 }
    //                 if($decimal == 2){
    //                     $twelve = 0.00;
    //                 }
    //             }



    //             if($decimal == 0){
    //                 $pp = round($tran->debt_amt);
    //             }
    //             if($decimal == 1){
    //                 $pp = round($tran->debt_amt,1);
    //             }
    //             if($decimal == 2){
    //                 $pp = round($tran->debt_amt,2);
    //             }

    //             $final[]=array('asset_category' => $tran->asset_category,'name'=>$tran->name,'purchase_price'=>$pp,'date'=>$company[0]->date_format,'first'=>$first,'second'=>$second,'third'=>$third,'fourth'=>$fourth,'fifth'=>$fifth,'sixth'=>$sixth,'seventh'=>$seventh,'eigth'=>$eigth,'nine'=>$nine,'ten'=>$ten,'eleven'=>$eleven,'twelve'=>$twelve,'life'=>$finallife,'asset_key'=>$tran->asset_key,'start_date'=>$tran->start_date);
    //             $total[]=array('first'=>$first,'second'=>$second,'third'=>$third,'fourth'=>$fourth,'fifth'=>$fifth,'sixth'=>$sixth,'seventh'=>$seventh,'eigth'=>$eigth,'nine'=>$nine,'ten'=>$ten,'eleven'=>$eleven,'twelve'=>$twelve);
    //         }
    //         $sumArray = array();

    //         $key = 'first';
    //         $sum1 = array_sum(array_column($total,$key));
    //         if($decimal == 0){
    //             $sum1 = round($sum1);
    //         }
    //         if($decimal == 1){
    //             $sum1 = number_format($sum1,1);
    //         }
    //         if($decimal == 2){
    //             $sum1 = number_format($sum1,2);
    //         }
    //         $key = 'second';
    //         $sum2 = array_sum(array_column($total,$key));

    //         $key = 'third';
    //         $sum3 = array_sum(array_column($total,$key));

    //         $key = 'fourth';
    //         $sum4 = array_sum(array_column($total,$key));

    //         $key = 'fifth';
    //         $sum5 = array_sum(array_column($total,$key));

    //         $key = 'sixth';
    //         $sum6 = array_sum(array_column($total,$key));

    //         $key = 'seventh';
    //         $sum7 = array_sum(array_column($total,$key));

    //         $key = 'eigth';
    //         $sum8 = array_sum(array_column($total,$key));

    //         $key = 'nine';
    //         $sum9 = array_sum(array_column($total,$key));

    //         $key = 'ten';
    //         $sum10 = array_sum(array_column($total,$key));

    //         $key = 'eleven';
    //         $sum11 = array_sum(array_column($total,$key));

    //         $key = 'twelve';
    //         $sum12 = array_sum(array_column($total,$key));

    //         $key = 'purchase_price';
    //         $pp = array_sum(array_column($final,$key));
    //         if($decimal == 0){
    //             $pp = round($pp);
    //         }
    //         if($decimal == 1){
    //             $pp = number_format($pp,1);
    //         }
    //         if($decimal == 2){
    //             $pp = number_format($pp,2);
    //         }
    //         $list[]=array('asset_category' => $grp->asset_category,'purchase_price'=>$pp,'final'=>$final,'first'=>$sum1,'second'=>$sum2,'third'=>$sum3,'fourth'=>$sum4,'fifth'=>$sum5,'sixth'=>$sum6,'seventh'=>$sum7,'eigth'=>$sum8,'nine'=>$sum9,'ten'=>$sum10,'eleven'=>$sum11,'twelve'=>$sum12);
    //     }
    //     echo '<pre>';
    //     echo print_r($list);
    //     echo '</pre>';
    //     exit();
    //     return view('fixed_asset_register' , compact('company','final','list'));
    // } 

    //Temp Check
    function temp(Request $request){
        
        $finalResult = DB::table($this->tbl_transaction)->where('is_txn_processed', 1)->get();
        foreach($finalResult as $value){
            $company = DB::table($this->tbl_company)->where('company_id', $value->company_id)->get();
            $getdata = DB::table($this->tbl_transaction)->where('asset_key', $value->asset_key)->get();
            $method         = $company[0]->date_format;
            $method         = $company[0]->first_month_depreciation_method;
            $amount         = $getdata[0]->debt_amt;
            $purchase_date  = $getdata[0]->txn_date;
            $life           = $getdata[0]->default_life;
            $salvage_value  = $getdata[0]->salvage_value;
            if($method == 'Pro-Rate') {
                $days=date('t');
                $salvage_value;
                if(!empty($salvage_value) && $salvage_value>0){
                    $totalamount = $amount;
                    $finalamount =$amount-$amount*$salvage_value/100;
                    $sv = $salvage_value;
                }
                else{
                    $sv = 0;
                    $finalamount = $amount;
                }
                $curday = date('j',strtotime($purchase_date));
                $finaldays=$days-$curday;
                $count = DB::table($this->tbl_fa_depreciation)->where('asset_key', $value->asset_key)->get()->count();
                
                $finalcount=$life+1;
                // echo 'Final '.$finalcount;
                // echo 'Count '.$count;
                // echo '<br>';
                if($finalcount>$count){
                    if($count>0 && $count<$life){
                        $famount = $finalamount/$life;
                    }
                    elseif($count == $life) {
                        $db=DB::table($this->tbl_fa_depreciation)->where('asset_key', $value->asset_key)->orderBy('id', 'asc')->limit(1)->get();
                        $damount=$finalamount/$life;
                        $famount = $damount-$db[0]->period_dep;
                    }   
                    else{
                        $damount=$finalamount/$life;
                        $famount = $damount*$finaldays/$days;
                    }
                    $db1=DB::table($this->tbl_fa_depreciation)->where('asset_key', $value->asset_key)->orderBy('id', 'desc')->limit(1)->get();
                    $closingbalance=$db1[0]->closing_bal - $famount;
                    $opening_bal=$db1[0]->closing_bal;
                    $curdate = date('Y-m-d');
                    $values  = array('asset_key' =>$value->asset_key,'month' => $curdate,'opening_bal' => $opening_bal,'closing_bal' => $closingbalance,'period_dep' => $famount);
                    
                    $insert=DB::table($this->tbl_fa_depreciation)->insert($values);  
                } 
            }

            if($method == 'Half-Month') {
                $days=date('t');
                $salvage_value;
                if(!empty($salvage_value) && $salvage_value>0){
                    $totalamount = $amount;
                    $finalamount =$amount-$amount*$salvage_value/100;
                    $sv = $salvage_value;
                }
                else{
                    $sv = 0;
                    $finalamount = $amount;
                }
                $curday = date('j',strtotime($purchase_date));
                $finaldays=$days-$curday;
                $count = DB::table($this->tbl_fa_depreciation)->where('asset_key', $value->asset_key)->get()->count();
                $finalcount=$life+1;
                // echo 'Final '.$finalcount;
                // echo 'Count '.$count;
                // echo '<br>';
                if($finalcount>$count){
                    if($count>0  && $count<$life){
                        $famount = $finalamount/$life;
                    }
                    elseif($count == $life) {
                        $db=DB::table($this->tbl_fa_depreciation)->where('asset_key', $value->asset_key)->orderBy('id', 'asc')->limit(1)->get();
                        $damount=$finalamount/$life;
                        $famount = $damount/2;
                    }   
                    else{
                        $damount=$finalamount/$life;
                        $famount = $damount/2;
                    }
                    $db1=DB::table($this->tbl_fa_depreciation)->where('asset_key', $value->asset_key)->orderBy('id', 'desc')->limit(1)->get();

                    $closingbalance=$db1[0]->closing_bal - $famount;
                    $opening_bal=$db1[0]->closing_bal;
                    $curdate = date('Y-m-d');
                    $values  = array('asset_key' =>$value->asset_key,'month' => $curdate,'opening_bal' => $opening_bal,'closing_bal' => $closingbalance,'period_dep' => $famount);
                    
                    $insert=DB::table($this->tbl_fa_depreciation)->insert($values);   
                }
            }


            if($method == 'First 15 Days Full Month') {
                $days=date('t');
                $salvage_value;
                if(!empty($salvage_value) && $salvage_value>0){
                    $totalamount = $amount;
                    $finalamount =$amount-$amount*$salvage_value/100;
                    $sv = $salvage_value;
                }
                else{
                    $sv = 0;
                    $finalamount = $amount;
                }
                $curday = date('j',strtotime($purchase_date));
                $finaldays=$days-$curday;
                $count = DB::table($this->tbl_fa_depreciation)->where('asset_key', $value->asset_key)->get()->count();
                if($curday<=15){    
                    $finalcount=$life;
                }
                else{
                    $finalcount=$life+1;   
                }
                if($finalcount>$count){
                    $db=DB::table($this->tbl_fa_depreciation)->where('asset_key', $value->asset_key)->orderBy('id', 'asc')->limit(1)->get();
                    
                    if($count>0  && $count<$life){
                        $famount = $finalamount/$life;
                    }
                    elseif($count == $life) {
                        $db=DB::table($this->tbl_fa_depreciation)->where('asset_key', $value->asset_key)->orderBy('id', 'asc')->limit(1)->get();
                        $damount=$finalamount/$life;
                        $famount = $damount/2;
                    }   
                    elseif($curday<=15){
                        $damount=$finalamount/$life;
                        $famount = $damount;    
                    }
                    else{ 
                        $damount=$finalamount/$life;
                        $famount = 0;
                    }

                    $db1=DB::table($this->tbl_fa_depreciation)->where('asset_key', $value->asset_key)->orderBy('id', 'desc')->limit(1)->get();
                    $closingbalance=$db1[0]->closing_bal - $famount;
                    $opening_bal=$db1[0]->closing_bal;
                    $curdate = date('Y-m-d');
                    $values  = array('asset_key' =>$value->asset_key,'month' => $curdate,'opening_bal' => $opening_bal,'closing_bal' => $closingbalance,'period_dep' => $famount);
                    
                    $insert=DB::table($this->tbl_fa_depreciation)->insert($values);   
                    
                }
            }


        }
        
    }

}

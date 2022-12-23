<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\QBO;
use Illuminate\Support\Facades\DB;
use Hash;
use Session;
use QuickBooksOnline\API\DataService\DataService;

class APIController extends Controller
{
	private $tbl_company;
    private $tbl_users;
    private $tbl_transaction;
    private $tbl_rules;
    private $tbl_fa_depreciation;
    private $tbl_QBO_account;
    private $tbl_company_user;
    private $tbl_pre_assets;
    

    public function __construct()
    {
        $this->tbl_company=env('TABLE_COMPANY');
        $this->tbl_users=env('TABLE_USERS');
        $this->tbl_transaction=env('TABLE_TRANSACTIONS');
        $this->tbl_rules=env('TABLE_RULES');
        $this->tbl_fa_depreciation=env('TABLE_FA_DS');
        $this->tbl_QBO_account=env('TABLE_QBO_ACCOUNT');
        $this->tbl_company_user=env('TABLE_COMPANY_USER');
        $this->tbl_pre_assets=env('TABLE_PRE_ASSETS');
    }

    public function GetAccountById(Request $req){
    	$base_url=env('QBO_URL');
	    $accessToken = Session::get('accessToken');
	    $companyid = Session::get('realmid');
		$curl = curl_init();
		curl_setopt_array($curl, array(
		  CURLOPT_URL => $base_url.'/v3/company/'.$companyid.'/account/'.$req->id.'?minorversion=62',
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
		
		$response1=json_decode($response);
		$count=DB::table($this->tbl_pre_assets)->where('account_sub_type', $response1->Account->AccountSubType)->get()->count();
		if($count>0){
			$data=DB::table($this->tbl_pre_assets)->where('account_sub_type', $response1->Account->AccountSubType)->first();
			return response()->json(['data'=> $response1 ,'track' => $req->track,'gl' => $req->gl,'accumulated' => $req->accumulated,'default_method'=>$data->default_method,'default_life'=>$data->default_life,'asset_category'=>$data->asset_category,'asset_id'=>$response1->Account->Id]);
		}
		else{
			return response()->json(['data'=> $response1 ,'track' => $req->track,'gl' => $req->gl,'accumulated' => $req->accumulated,'default_method'=>'','default_life'=>'0','asset_category'=>'','asset_id'=>$response1->Account->Id]);	
		}

    }

    //Step1 Company Save 
    function savecompanystep1(Request $request){
    	$companyid = Session::get('realmid');
    	$finalResult = DB::table($this->tbl_company)->where('company_id', $companyid)->update(['company_name' => $request->company_name,'default_currency'=>$request->currency,'industry'=>$request->industry,'fiscal_year'=>$request->fiscal_date]);
    }
    //Step2 Company Save 
    function savecompanystep2(Request $request){
    	$companyid = Session::get('realmid');
    	$fa          =implode(",",$request->fixed_assets);
    	$accumulated =implode(",",$request->accumulated);
    	$track       =implode(",",$request->track);
    	$gl          =implode(",",$request->gl);
    	$finalResult = DB::table($this->tbl_company)->where('company_id', $companyid)->update(['fixed_assets' => $fa,'accumulated'=>$accumulated,'track'=>$track,'gl'=>$gl,'decimal_round'=>$request->decimal_round,'deminus_amount'=>$request->deminus_amount]);
    }
    function GetDepreciation(Request $request){
    	//print_r($_POST);
    	//echo $request->ids;
    	$companyid = Session::get('realmid');
    	$ID=explode(',',$request->ids);
    	$id=array();
    	$final=array();
    	$keys=array();
    	foreach($ID as $ids){
    		$id[]=$ids;
    		$finalResult = DB::table($this->tbl_transaction)->where('company_id', $companyid)->where('asset_key', $ids)->first();
    		$final[]=array('asset_category' => $finalResult->asset_category,'name'=>$finalResult->name,'purchase_price'=>$finalResult->debt_amt,'asset_key'=>$finalResult->asset_key);
    		$keys[]=array('asset_category' => $finalResult->asset_category);
    	}
    	if(!empty($keys)){
    		$mykeys = array_unique($keys,SORT_REGULAR);
    		$data='';
    		foreach($mykeys as $val){
    			$sum=0;
    			$totaldep=0;
    			$NBV=0;
    			foreach($final as $fin){
    				if($fin['asset_category'] == $val['asset_category']){
    					$sum+=$fin['purchase_price'];
    					$totaldep+=DB::table($this->tbl_fa_depreciation)->where('asset_key', $fin['asset_key'])->sum('period_dep');
    					$NBV+=$fin['purchase_price']-DB::table($this->tbl_fa_depreciation)->where('asset_key', $fin['asset_key'])->sum('period_dep');
    				}
    			}
    			$acc = DB::table($this->tbl_rules)->where('company_id', $companyid)->where('asse_category', $val['asset_category'])->first();	
    			$acc_dep_acc = DB::table($this->tbl_QBO_account)->where('company_id', $companyid)->where('QBO_account_id', $acc->QBO_acc_dep_ac)->first();
    			$dep_acc = DB::table($this->tbl_QBO_account)->where('company_id', $companyid)->where('QBO_account_id', $acc->QBO_dep_ac)->first();	
    			$gain_loss = DB::table($this->tbl_QBO_account)->where('company_id', $companyid)->where('QBO_account_id', $acc->QBO_gain_loss_ac)->first();	
    			$asset_ac = DB::table($this->tbl_QBO_account)->where('company_id', $companyid)->where('QBO_account_id', $acc->QBO_FA_ac_id)->first();	

	    		$data.='<div class="row margin-bottom-10 margin-top-10" style="border:1px solid #000;">';
		    		$data.='<div class="col-md-6 text-left" style="padding-top: 5px;padding-bottom: 5px;">';
					$data.="Accounts";
		    		$data.='</div>';
		    		$data.='<div class="col-md-3 text-left" style="padding-top: 5px;padding-bottom: 5px;">';
					$data.= "Dr";
		    		$data.='</div>';
		    		$data.='<div class="col-md-3 text-right" style="padding-top: 5px;padding-bottom: 5px;">';
					$data.= "Cr";
		    		$data.='</div>';
		    		$data.='<div class="col-md-6 text-left" style="padding-top: 5px;padding-bottom: 5px;">';
					$data.=$acc_dep_acc->QBO_ac_number ." ".$acc_dep_acc->QBO_ac_name;
		    		$data.='</div>';
		    		$data.='<div class="col-md-3 text-left" style="padding-top: 5px;padding-bottom: 5px;">';
					$data.= $totaldep;
		    		$data.='</div>';
		    		$data.='<div class="col-md-3 text-right" style="padding-top: 5px;padding-bottom: 5px;">';
					$data.= "";
		    		$data.='</div>';
		    		if($request->sold == "No"){
		    			$data.='<div class="col-md-6 text-left" style="background-color:#F3F9FE;padding-top: 5px;padding-bottom: 5px;">';
						$data.=$dep_acc->QBO_ac_number ." ".$dep_acc->QBO_ac_name;
			    		$data.='</div>';
			    		$data.='<div class="col-md-3 text-left" style="background-color:#F3F9FE;padding-top: 5px;padding-bottom: 5px;">';
						$data.= $NBV;
			    		$data.='</div>';
			    		$data.='<div class="col-md-3 text-right" style="background-color:#F3F9FE;padding-top: 5px;padding-bottom: 5px;">';
						$data.= "";
			    		$data.='</div>';
		    		}
		    		
		    		if($request->sold == "Yes"){
		    			$data.='<div class="col-md-6 text-left" style="padding-top: 5px;padding-bottom: 5px;">';
						$data.=$gain_loss->QBO_ac_number ." ".$gain_loss->QBO_ac_name;
			    		$data.='</div>';
			    		$data.='<div class="col-md-3 text-left" style="padding-top: 5px;padding-bottom: 5px;">';
						$data.= $NBV;
			    		$data.='</div>';
			    		$data.='<div class="col-md-3 text-right" style="padding-top: 5px;padding-bottom: 5px;">';
						$data.= "";
			    		$data.='</div>';
		    		}
		    		
		    		$data.='<div class="col-md-6 text-left" style="background-color:#F3F9FE;padding-top: 5px;padding-bottom: 5px;">';
					$data.=$asset_ac->QBO_ac_number ." ".$asset_ac->QBO_ac_name;
		    		$data.='</div>';
		    		$data.='<div class="col-md-3 text-right" style="background-color:#F3F9FE;padding-top: 5px;padding-bottom: 5px;">';
					$data.= "";
		    		$data.='</div>';
		    		$data.='<div class="col-md-3 text-right" style="background-color:#F3F9FE;padding-top: 5px;padding-bottom: 5px;">';
					$data.= $sum;
		    		$data.='</div>';
	    		$data.='</div>';

	    	}
	    	echo json_encode($data);
    	}
    	//print_r($final);
    }

}
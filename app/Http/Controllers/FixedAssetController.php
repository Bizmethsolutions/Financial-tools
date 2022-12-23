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

class FixedAssetController extends Controller
{   

    private $tbl_company;
    private $tbl_users;
    private $tbl_transaction;
    private $tbl_rules;
    private $tbl_fa_depreciation;
    private $tbl_QBO_account;
    private $tbl_company_user;
    private $tbl_pre_assets;
    private $tbl_temp;
    

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
        $this->tbl_fixed_asset_detail=env('TABLE_PRE_ASSETS');
        $this->tbl_temp=env('TABLE_TEMP');
    }

    function fixed_asset_detail($id){
        $company_id = Session::get('realmid');
        $company=DB::table($this->tbl_company)->where('company_id', $company_id)->get();
        $transactions=DB::table($this->tbl_transaction)->where('asset_key', $id)->get();
        $Fa1=DB::table($this->tbl_fa_depreciation)->where('asset_key', $id)->get();
        $Fa=DB::table($this->tbl_temp)->where('asset_key', $id)->get();
        $decimal=$company[0]->decimal_round;
        return view('fixed_asset_detail' , compact('company','transactions','Fa','decimal'));
    }

    //Get data for fixed asset register
    function dispose(){
        $company_id = Session::get('realmid');
        $company=DB::table($this->tbl_company)->where('company_id', $company_id)->get();
        $group=DB::table($this->tbl_transaction)->where('company_id', $company_id)->where('is_txn_processed', 1)->groupBy('asset_category')->get();
        
        $list=array();
        // foreach($group as $grp){
        //     $transaction=DB::table($this->tbl_transaction)->where('company_id', $company_id)->where('is_txn_processed', 1)->where('asset_category', $grp->asset_category)->get();
        //     $final=array();
        //     $total=array();
        //     foreach($transaction as $tran){
                
        //         $Fa=DB::table($this->tbl_fa_depreciation)->where('asset_key', $tran->asset_key)->whereMonth('month', date('m'))->first();
        //         $count=DB::table($this->tbl_fa_depreciation)->where('asset_key', $tran->asset_key)->get()->count();
        //         $famount = '';
        //         $second  = '';
        //         $third   = '';
        //         $life    = $tran->default_life+1;
        //         if($count >0 && $life>$count){

        //             $method         = $company[0]->first_month_depreciation_method;
        //             $amount         = $tran->debt_amt;
        //             $purchase_date  = $tran->txn_date;
        //             $life           = $tran->default_life;
        //             $salvage_value  = $tran->salvage_value;
                    
        //             if($method == 'Pro-Rate') {
        //                 $days=date('t');
        //                 $salvage_value;
        //                 if(!empty($salvage_value) && $salvage_value>0){
        //                     $totalamount = $amount;
        //                     $finalamount =$amount-$amount*$salvage_value/100;
        //                     $sv = $salvage_value;
        //                 }
        //                 else{
        //                     $sv = 0;
        //                     $finalamount = $amount;
        //                 }
        //                 $curday = date('j',strtotime($purchase_date));
        //                 $finaldays=$days-$curday;
        //                 $life = $tran->default_life;
        //                 $count = DB::table($this->tbl_fa_depreciation)->where('asset_key', $tran->asset_key)->get()->count();
        //                 $finalcount=$life+1;
        //                 if($finalcount>=$count){
        //                     if($count>0 && $count<$life){
        //                         $famount = $finalamount/$life;
        //                     }
        //                     if($count == $life) {
        //                         $db=DB::table($this->tbl_fa_depreciation)->where('asset_key', $tran->asset_key)->orderBy('id', 'asc')->limit(1)->get();
        //                         $damount=$finalamount/$life;
        //                         $famount = $damount-$db[0]->period_dep;
        //                     }     
        //                 } 
        //             }
                    
        //             if($method == 'Half-Month') {
        //                 $days=date('t');
        //                 $salvage_value;
        //                 if(!empty($salvage_value) && $salvage_value>0){
        //                     $totalamount = $amount;
        //                     $finalamount =$amount-$amount*$salvage_value/100;
        //                     $sv = $salvage_value;
        //                 }
        //                 else{
        //                     $sv = 0;
        //                     $finalamount = $amount;
        //                 }
        //                 $curday = date('j',strtotime($purchase_date));
        //                 $finaldays=$days-$curday;
        //                 $count = DB::table($this->tbl_fa_depreciation)->where('asset_key', $value)->get()->count();
        //                 $finalcount=$life+1;
        //                 if($finalcount>=$count){
        //                     if($count>0  && $count<$life){
        //                         $famount = $finalamount/$life;
        //                     }
        //                     elseif($count == $life) {
        //                         $db=DB::table($this->tbl_fa_depreciation)->where('asset_key', $value)->orderBy('id', 'asc')->limit(1)->get();
        //                         $damount=$finalamount/$life;
        //                         $famount = $damount/2;
        //                     }   
        //                     else{
        //                         $damount=$finalamount/$life;
        //                         $famount = $damount/2;
        //                     }
        //                     $closingbalance=$finalamount-$famount;
        //                 }
        //             }


        //             if($method == 'First 15 Days Full Month') {
        //                 $days=date('t');
        //                 $salvage_value;
        //                 if(!empty($salvage_value) && $salvage_value>0){
        //                     $totalamount = $amount;
        //                     $finalamount =$amount-$amount*$salvage_value/100;
        //                     $sv = $salvage_value;
        //                 }
        //                 else{
        //                     $sv = 0;
        //                     $finalamount = $amount;
        //                 }
        //                 $curday = date('j',strtotime($purchase_date));
        //                 $finaldays=$days-$curday;
        //                 $count = DB::table($this->tbl_fa_depreciation)->where('asset_key', $value)->get()->count();
        //                 $finalcount=$life+1;
        //                 if($finalcount>$count){
        //                     if($count>0  && $count<$life){
        //                         $famount = $finalamount/$life;
        //                     }
        //                     elseif($count == $life) {
        //                         $db=DB::table($this->tbl_fa_depreciation)->where('asset_key', $value)->orderBy('id', 'asc')->limit(1)->get();
        //                         $damount=$finalamount/$life;
        //                         $famount = $damount/2;
        //                     }   
        //                     else{
        //                         if($curday<=15){
        //                             $damount=$finalamount/$life;
        //                             $famount = $damount;    
        //                         }
        //                         else{
        //                             $damount=$finalamount/$life;
        //                             $famount = 0;
        //                         }
                                
        //                     }
        //                     $closingbalance=$finalamount-$famount;
        //                 }
        //             }

        //         }
        //         else{
        //             $famount = 0.00;
                    
        //         }
        //         $final[]=array('asset_category' => $tran->asset_category,'name'=>$tran->name,'purchase_price'=>$tran->debt_amt,'date'=>$company[0]->date_format,'first'=>$Fa->period_dep,'second'=>number_format($famount,2),'third'=>number_format($famount,2),'life'=>$life,'asset_key'=>$tran->asset_key);
        //         $total[]=array('first'=>$Fa->period_dep,'second'=>$famount,'third'=>$famount);
        //     }
        //     $sumArray = array();

        //     $key = 'first';
        //     $sum1 = array_sum(array_column($total,$key));

        //     $key = 'second';
        //     $sum2 = array_sum(array_column($total,$key));

        //     $key = 'third';
        //     $sum3 = array_sum(array_column($total,$key));

        //     $key = 'purchase_price';
        //     $pp = array_sum(array_column($final,$key));

        //     $list[]=array('asset_category' => $grp->asset_category,'purchase_price'=>$pp,'final'=>$final,'first'=>number_format($sum1,2),'second'=>number_format($sum2,2),'third'=>number_format($sum3,2));
        // }
        // echo '<pre>';
        // echo print_r($list);
        // echo '</pre>';
        // exit();
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
                // if($count >0 && $life>$count){

                //     $method         = $company[0]->first_month_depreciation_method;
                //     $amount         = $tran->debt_amt;
                //     $purchase_date  = $tran->txn_date;
                //     $life           = $tran->default_life;
                //     $salvage_value  = $tran->salvage_value;
                    
                //     if($method == 'Pro-Rate') {
                //         $days=date('t');
                //         $salvage_value;
                //         if(!empty($salvage_value) && $salvage_value>0){
                //             $totalamount = $amount;
                //             $finalamount =$amount-$amount*$salvage_value/100;
                //             $sv = $salvage_value;
                //         }
                //         else{
                //             $sv = 0;
                //             $finalamount = $amount;
                //         }
                //         $curday = date('j',strtotime($purchase_date));
                //         $finaldays=$days-$curday;
                //         $life = $tran->default_life;
                //         $count = DB::table($this->tbl_fa_depreciation)->where('asset_key', $tran->asset_key)->get()->count();
                //         $finalcount=$life+1;
                //         if($finalcount>=$count){
                //             if($count>0 && $count<$life){
                //                 $famount = $finalamount/$life;
                //             }
                //             if($count == $life) {
                //                 $db=DB::table($this->tbl_fa_depreciation)->where('asset_key', $tran->asset_key)->orderBy('id', 'asc')->limit(1)->get();
                //                 $damount=$finalamount/$life;
                //                 $famount = $damount-$db[0]->period_dep;
                //             }     
                //         } 
                //     }
                    
                //     if($method == 'Half-Month') {
                //         $days=date('t');
                //         $salvage_value;
                //         if(!empty($salvage_value) && $salvage_value>0){
                //             $totalamount = $amount;
                //             $finalamount =$amount-$amount*$salvage_value/100;
                //             $sv = $salvage_value;
                //         }
                //         else{
                //             $sv = 0;
                //             $finalamount = $amount;
                //         }
                //         $curday = date('j',strtotime($purchase_date));
                //         $finaldays=$days-$curday;
                //         $count = DB::table($this->tbl_fa_depreciation)->where('asset_key', $value)->get()->count();
                //         $finalcount=$life+1;
                //         if($finalcount>=$count){
                //             if($count>0  && $count<$life){
                //                 $famount = $finalamount/$life;
                //             }
                //             elseif($count == $life) {
                //                 $db=DB::table($this->tbl_fa_depreciation)->where('asset_key', $value)->orderBy('id', 'asc')->limit(1)->get();
                //                 $damount=$finalamount/$life;
                //                 $famount = $damount/2;
                //             }   
                //             else{
                //                 $damount=$finalamount/$life;
                //                 $famount = $damount/2;
                //             }
                //             $closingbalance=$finalamount-$famount;
                //         }
                //     }


                //     if($method == 'First 15 Days Full Month') {
                //         $days=date('t');
                //         $salvage_value;
                //         if(!empty($salvage_value) && $salvage_value>0){
                //             $totalamount = $amount;
                //             $finalamount =$amount-$amount*$salvage_value/100;
                //             $sv = $salvage_value;
                //         }
                //         else{
                //             $sv = 0;
                //             $finalamount = $amount;
                //         }
                //         $curday = date('j',strtotime($purchase_date));
                //         $finaldays=$days-$curday;
                //         $count = DB::table($this->tbl_fa_depreciation)->where('asset_key', $value)->get()->count();
                //         $finalcount=$life+1;
                //         if($finalcount>$count){
                //             if($count>0  && $count<$life){
                //                 $famount = $finalamount/$life;
                //             }
                //             elseif($count == $life) {
                //                 $db=DB::table($this->tbl_fa_depreciation)->where('asset_key', $value)->orderBy('id', 'asc')->limit(1)->get();
                //                 $damount=$finalamount/$life;
                //                 $famount = $damount/2;
                //             }   
                //             else{
                //                 if($curday<=15){
                //                     $damount=$finalamount/$life;
                //                     $famount = $damount;    
                //                 }
                //                 else{
                //                     $damount=$finalamount/$life;
                //                     $famount = 0;
                //                 }
                                
                //             }
                //             $closingbalance=$finalamount-$famount;
                //         }
                //     }

                // }
                // else{
                //     $famount = 0.00;
                    
                // }
                // if(!empty($Fa->period_dep)){
                //     $first=$Fa->period_dep;
                // }
                // else{
                //     $first='';
                // }
                $year=date('Y');
                
                $first=DB::table($this->tbl_temp)->where('asset_key', $tran->asset_key)->whereMonth('month', '01')->whereYear('month', '=', $year)->first();
                if(!empty($first)){
                    $first = $first->period_dep;
                }
                else{
                    $first = 0.00;   
                }

                $second=DB::table($this->tbl_temp)->where('asset_key', $tran->asset_key)->whereMonth('month', '02')->whereYear('month', '=', $year)->first();
                if(!empty($second)){
                    $second = $second->period_dep;
                }
                else{
                    $second = 0.00;   
                }

                $third=DB::table($this->tbl_temp)->where('asset_key', $tran->asset_key)->whereMonth('month', '03')->whereYear('month', '=', $year)->first();
                if(!empty($third)){
                    $third = $third->period_dep;
                }
                else{
                    $third = 0.00;   
                }

                $fourth=DB::table($this->tbl_temp)->where('asset_key', $tran->asset_key)->whereMonth('month', '04')->whereYear('month', '=', $year)->first();
                if(!empty($fourth)){
                    $fourth = $fourth->period_dep;
                }
                else{
                    $fourth = 0.00;   
                }

                $fifth=DB::table($this->tbl_temp)->where('asset_key', $tran->asset_key)->whereMonth('month', '05')->whereYear('month', '=', $year)->first();
                if(!empty($fifth)){
                    $fifth = $fifth->period_dep;
                }
                else{
                    $fifth = 0.00;   
                }

                $sixth=DB::table($this->tbl_temp)->where('asset_key', $tran->asset_key)->whereMonth('month', '06')->whereYear('month', '=', $year)->first();
                if(!empty($sixth)){
                    $sixth = $sixth->period_dep;
                }
                else{
                    $sixth = 0.00;   
                }

                $seventh=DB::table($this->tbl_temp)->where('asset_key', $tran->asset_key)->whereMonth('month', '07')->whereYear('month', '=', $year)->first();
                if(!empty($seventh)){
                    $seventh = $seventh->period_dep;
                }
                else{
                    $seventh = 0.00;   
                }

                $eigth=DB::table($this->tbl_temp)->where('asset_key', $tran->asset_key)->whereMonth('month', '08')->whereYear('month', '=', $year)->first();
                if(!empty($eigth)){
                    $eigth = $eigth->period_dep;
                }
                else{
                    $eigth = 0.00;   
                }

                $nine=DB::table($this->tbl_temp)->where('asset_key', $tran->asset_key)->whereMonth('month', '09')->whereYear('month', '=', $year)->first();
                if(!empty($nine)){
                    $nine = $nine->period_dep;
                }
                else{
                    $nine = 0.00;   
                }

                $ten=DB::table($this->tbl_temp)->where('asset_key', $tran->asset_key)->whereMonth('month', '10')->whereYear('month', '=', $year)->first();
                if(!empty($ten)){
                    $ten = $ten->period_dep;
                }
                else{
                    $ten = 0.00;   
                }

                $eleven=DB::table($this->tbl_temp)->where('asset_key', $tran->asset_key)->whereMonth('month', '11')->whereYear('month', '=', $year)->first();
                if(!empty($eleven)){
                    $eleven = $eleven->period_dep;
                }
                else{
                    $eleven = 0.00;   
                }

                $twelve=DB::table($this->tbl_temp)->where('asset_key', $tran->asset_key)->whereMonth('month', '12')->whereYear('month', '=', $year)->first();
                if(!empty($twelve)){
                    $twelve = $twelve->period_dep;
                }
                else{
                    $twelve = 0.00;   
                }





                $final[]=array('asset_category' => $tran->asset_category,'name'=>$tran->name,'purchase_price'=>$tran->debt_amt,'date'=>$company[0]->date_format,'first'=>$first,'second'=>number_format($second,2),'third'=>number_format($third,2),'fourth'=>number_format($fourth,2),'fifth'=>number_format($fifth,2),'sixth'=>number_format($sixth,2),'seventh'=>number_format($seventh,2),'eigth'=>number_format($eigth,2),'nine'=>number_format($nine,2),'ten'=>number_format($ten,2),'eleven'=>number_format($eleven,2),'twelve'=>number_format($twelve,2),'life'=>$finallife,'asset_key'=>$tran->asset_key);
                $total[]=array('first'=>$first,'second'=>$second,'third'=>$third,'fourth'=>$fourth,'fifth'=>$fifth,'sixth'=>$sixth,'seventh'=>$seventh,'eigth'=>$eigth,'nine'=>$nine,'ten'=>$ten,'eleven'=>$eleven,'twelve'=>$twelve);
            }
            $sumArray = array();

            $key = 'first';
            $sum1 = array_sum(array_column($total,$key));

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

            $list[]=array('asset_category' => $grp->asset_category,'purchase_price'=>$pp,'final'=>$final,'first'=>number_format($sum1,2),'second'=>number_format($sum2,2),'third'=>number_format($sum3,2),'fourth'=>number_format($sum4,2),'fifth'=>number_format($sum5,2),'sixth'=>number_format($sum6,2),'seventh'=>number_format($sum7,2),'eigth'=>number_format($sum8,2),'nine'=>number_format($sum9,2),'ten'=>number_format($sum10,2),'eleven'=>number_format($sum11,2),'twelve'=>number_format($sum12,2));
        }
        return view('dispose-assets' , compact('company','final','list'));
    } 

    //Search Get data for fixed asset register
    function fixed_asset_search(Request $request){
        $start_date=date('Y',strtotime($request->input('start_date')));
        $company_id = Session::get('realmid');
        $company=DB::table($this->tbl_company)->where('company_id', $company_id)->get();
        $group=DB::table($this->tbl_transaction)->where('company_id', $company_id)->where('is_txn_processed', 1)->whereYear('start_date', $start_date)->groupBy('asset_category')->get();
        
        $list=array();
        $final=array();
        foreach($group as $grp){
            $transaction=DB::table($this->tbl_transaction)->where('company_id', $company_id)->where('is_txn_processed', 1)->where('asset_category', $grp->asset_category)->get();
            $final=array();
            $total=array();
            foreach($transaction as $tran){
                
                $Fa=DB::table($this->tbl_fa_depreciation)->where('asset_key', $tran->asset_key)->whereMonth('month', date('m'))->whereYear('month', $start_date)->first();
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
                $first=DB::table($this->tbl_temp)->where('asset_key', $tran->asset_key)->whereMonth('month', '01')->whereYear('month', '=', $start_date)->first();
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

                $second=DB::table($this->tbl_temp)->where('asset_key', $tran->asset_key)->whereMonth('month', '02')->whereYear('month', '=', $start_date)->first();
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

                $third=DB::table($this->tbl_temp)->where('asset_key', $tran->asset_key)->whereMonth('month', '03')->whereYear('month', '=', $start_date)->first();
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

                $fourth=DB::table($this->tbl_temp)->where('asset_key', $tran->asset_key)->whereMonth('month', '04')->whereYear('month', '=', $start_date)->first();
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

                $fifth=DB::table($this->tbl_temp)->where('asset_key', $tran->asset_key)->whereMonth('month', '05')->whereYear('month', '=', $start_date)->first();
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

                $sixth=DB::table($this->tbl_temp)->where('asset_key', $tran->asset_key)->whereMonth('month', '06')->whereYear('month', '=', $start_date)->first();
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

                $seventh=DB::table($this->tbl_temp)->where('asset_key', $tran->asset_key)->whereMonth('month', '07')->whereYear('month', '=', $start_date)->first();
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

                $eigth=DB::table($this->tbl_temp)->where('asset_key', $tran->asset_key)->whereMonth('month', '08')->whereYear('month', '=', $start_date)->first();
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

                $nine=DB::table($this->tbl_temp)->where('asset_key', $tran->asset_key)->whereMonth('month', '09')->whereYear('month', '=', $start_date)->first();
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

                $ten=DB::table($this->tbl_temp)->where('asset_key', $tran->asset_key)->whereMonth('month', '10')->whereYear('month', '=', $start_date)->first();
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

                $eleven=DB::table($this->tbl_temp)->where('asset_key', $tran->asset_key)->whereMonth('month', '11')->whereYear('month', '=', $start_date)->first();
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

                $twelve=DB::table($this->tbl_temp)->where('asset_key', $tran->asset_key)->whereMonth('month', '12')->whereYear('month', '=', $start_date)->first();
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

                $final[]=array('asset_category' => $tran->asset_category,'name'=>$tran->name,'purchase_price'=>$pp,'date'=>$company[0]->date_format,'first'=>$first,'second'=>$second,'third'=>$third,'fourth'=>$fourth,'fifth'=>$fifth,'sixth'=>$sixth,'seventh'=>$seventh,'eigth'=>$eigth,'nine'=>$nine,'ten'=>$ten,'eleven'=>$eleven,'twelve'=>$twelve,'life'=>$finallife,'asset_key'=>$tran->asset_key,'start_date'=>$tran->start_date);
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

}

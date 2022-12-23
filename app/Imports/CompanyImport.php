<?php

namespace App\Imports;

use Session;
use DateTime;
use App\Models\Company;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\WithStartRow;
use PhpOffice\PhpSpreadsheet\Shared\Date;
use Maatwebsite\Excel\Concerns\ToModel;

class CompanyImport implements ToModel, WithStartRow
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
        $this->tbl_temp=env('TABLE_TEMP');
    }


    /**
     * @return int
     */
    public function startRow(): int
    {
        return 3;
    }




    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        if($row[3]>$row[6]){
            $company_id = Session::get('realmid');
            $date1 = \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row['4'])->format('Ymd');
            $txnid=$date1.$row['2'].$row['1'];
            $count = DB::table($this->tbl_transaction)->where('company_id', '=', $company_id)->where('QBO_txn_id', '=', $txnid)->count();
            if($count == 0){
                $date1 = \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row['4'])->format('Y-m-d');
                $date2 = \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row['9'])->format('Y-m-d');
                $d1=new DateTime($date2); 
                $d2=new DateTime($date1);                                  
                $Months = $d2->diff($d1); 
                $howeverManyMonths = (($Months->y) * 12) + ($Months->m);
                $remaininglife=$row[8]-$howeverManyMonths;
                $company_id = Session::get('realmid');
                $memo=$row[12];
                $accid=DB::table($this->tbl_QBO_account)->where('company_id', $company_id)->where('QBO_ac_number', $row['1'])->first();
                $asset_category=DB::table($this->tbl_pre_assets)->where('account_sub_type', $accid->account_subtype)->first();
                $credit_amt=0.00;
                $values = array('QBO_txn_id' => $txnid,'is_txn_processed' => 1,'QBO_FA_ac_id' => $accid->QBO_account_id,'debt_amt' => $row[3],'credit_amt' => $credit_amt,'company_id' => $company_id,'txn_date' => \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row['4'])->format('Y-m-d'),'account_name' =>$row[2],'memo' => $memo,'dep_method' => 'Straight-line','default_life' => $row[8],'name' => $row[2],'asset_category'=>$asset_category->asset_category,'is_historical'=>1,'remaining_life'=>$remaininglife);
                $insert=DB::table($this->tbl_transaction)->insert($values);
                $key = DB::table($this->tbl_transaction)->where('QBO_txn_id', $txnid)->first();
                $value=$key->asset_key;
                $finalcount=$remaininglife;
                $finalamount=$row[3]-$row[6];
                $secondlast=$remaininglife;
                for($x = 0; $x <$remaininglife; $x++){
                    if($x == 0){
                        $date=date('Y-m-d');
                        $curdate=date("Y-m-t", strtotime("+1 months", strtotime($date)));    
                    }
                    else{
                        $date=date('Y-m-d');
                        $xs=$x+1;
                        $curdate=date("Y-m-t", strtotime("+".$xs." months", strtotime($date)));       
                    }
                    
                    if($x==0){
                        $famount = $finalamount/$remaininglife;
                        $closingbalance=$finalamount - $famount;
                        $values  = array('asset_key' =>$value,'month' => $curdate,'opening_bal' => $row[3]-$row[6],'closing_bal' => $closingbalance,'period_dep' => $famount);
                        $insert=DB::table($this->tbl_temp)->insert($values);      
                    }
                    
                    else{
                        $famount = $finalamount/$remaininglife;
                        $db1=DB::table($this->tbl_temp)->where('asset_key', $value)->orderBy('id', 'desc')->limit(1)->get();
                        $closingbalance=$db1[0]->closing_bal - $famount;
                        $opening_bal=$db1[0]->closing_bal;
                        $values  = array('asset_key' =>$value,'month' => $curdate,'opening_bal' => $opening_bal,'closing_bal' => $closingbalance,'period_dep' => $famount);
                        $insert=DB::table($this->tbl_temp)->insert($values);  
                    }
                }
                
                return new Company([

                    'asset_fa_account'=> $row[1],
                    'asset_name'      => $row[2],
                    'Purchase_Price'  => $row[3],
                    'Purchase_month'  => \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row['4'])->format('Y-m-d'),
                    'Acc_Dep_PY'      => $row[5],
                    'Acc_Dep_CY'      => $row[6],
                    'Dep_Method'      => $row[7],
                    'Life'            => $row[8],
                    'Next_Dep_Month'  => \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row['9'])->format('Y-m-d'),
                    'remaining_life'  => $remaininglife,
                    'company_id'      => $company_id,
                    'QBO_txn_id'      => $txnid,
                    'asset_memo'      => $memo

                ]);
            }
        }
    }
}

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

class SettingController extends Controller
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
        $this->tbl_fixed_asset_detail=env('TABLE_PRE_ASSETS');
    }

    //Get user data to check 2 factor is enabled or not
    function index(){
        $user_id = Session::get('id');
        $companyid = Session::get('realmid');
        $user = DB::table($this->tbl_users)->where('id', $user_id)->get();
        return view('2-step', compact('user'));    
    }

    //Get user data to check 2 factor is enabled or not
    function save(Request $req){
        
        $user_id = Session::get('id');
        $companyid = Session::get('realmid');
        $user = DB::table($this->tbl_users)->where('id', $user_id)->get();
        if($user[0]->two_factor == 1){
            if (isset($_POST['check1'])) {
                $user_id = Session::get('id');
                $companyid = Session::get('realmid');
                DB::table($this->tbl_users)->where('id', $user_id)->update(['two_factor' => 1]);
                return redirect('2-factor-success');    
            } else {

                $user_id = Session::get('id');
                $companyid = Session::get('realmid');
                DB::table($this->tbl_users)->where('id', $user_id)->update(['two_factor' => 0]);
                return redirect('2-factor-deactive');    // Alternate code
            }
        }
        else{
            if (isset($_POST['check'])) {
                $user_id = Session::get('id');
                $companyid = Session::get('realmid');
                DB::table($this->tbl_users)->where('id', $user_id)->update(['two_factor' => 1]);
                return redirect('2-factor-success');    
            } else {

                $user_id = Session::get('id');
                $companyid = Session::get('realmid');
                DB::table($this->tbl_users)->where('id', $user_id)->update(['two_factor' => 0]);
                return redirect('2-factor');    // Alternate code
            }    
        }



        

        


        
    }    

}

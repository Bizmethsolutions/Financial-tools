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

class UserController extends Controller
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

    //post user data .
    function adduser(Request $request){
        $values = array('fname' =>$request->input('fname'),'lname' => $request->input('lname'),'email' => $request->input('email'),'role' => $request->input('role'),'password' => crypt::encrypt($request->input('password')));
        $insert=DB::table($this->tbl_users)->insert($values);
        if($insert){
            return redirect('/user-add-success');
        }
        else{
            return redirect('/user-add-error');
        }  
    }

    //Function to get user data
    function userlist(Request $request){
        $id=$user_id = Session::get('realmid');
        $users = DB::table($this->tbl_company_user)->where('company_id',$id)->get();
        $company = DB::table($this->tbl_company)->where('company_id',$id)->get()->first();
        return view('user-list', compact('users','company'));  
    }

    public function edit($id)
    {
        
        $users = DB::table($this->tbl_users)->where('id', '=' , $id)->get();
        return view('edituser', compact('users'));
        
    }

    public function link($id)
    {
        
        DB::table($this->tbl_company_user)->where('id', $id)->update(['flag' => 1]);
        return redirect('/user-list');
        
    }

    public function unlink($id)
    {
        
        DB::table($this->tbl_company_user)->where('id', $id)->update(['flag' => 0]);
        return redirect('/user-list');
        
    }

    public function update(Request $request, $id)
    {   
        $finalResult = DB::table($this->tbl_users)->where('id', $id)->update(['fname' => $request->fname,'lname'=>$request->lname,'role'=>$request->role]);
        if($finalResult){
            return redirect('/user-update-success');
        } else {
            return redirect('/user-update-error');
        }
        
    }

    public function delete($id)
    {
        $finalResult = DB::table($this->tbl_company_user)->where('id', $id)->delete();
        if($finalResult){
            return redirect('/user-delete-success');
        } else {
            return redirect('/user-delete-success');
        }
        
    }

    
}

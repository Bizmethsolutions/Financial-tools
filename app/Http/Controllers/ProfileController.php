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

class ProfileController extends Controller
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

    //Get current user profile data .
    function profile(){
        $email = Session::get('email');
        $result = DB::table($this->tbl_users)->where('email',$email)->get();
        $rows = $result->count();
        if($rows>0){
            return view('profile', compact('result'));
        }
        else{
            $req->session()->flash('register_status','This Email already exists.');
            return redirect('/dashboard');
        }
    }

    //Update profile data to db.
    function profile_update(Request $req){
        if($req->hasFile('file')){
            $file = $req->file('file');
            $file->getClientOriginalName();
            $file->getClientOriginalExtension();
            $file->getRealPath();
            $file->getSize();
            $file->getMimeType();
            $destinationPath = 'uploads';
            $name=time().$file->getClientOriginalName();
            $file->move($destinationPath,$name);
            $updates=DB::table($this->tbl_users)->where('id', $req->input('id'))->update(['profile'=>$name]);
            if($updates){
                return redirect('/profile-success');
            }
            else{
                return redirect('/profile-error');
            }  
        }
        
        $updates=DB::table($this->tbl_users)->where('id', $req->input('id'))->update(['title'=>$req->input('title'),'fname'=>$req->input('fname'),'lname'=>$req->input('lname')]); 
        if($updates){
            return redirect('/profile-success');
        }
        else{
            return redirect('/profile-error');
        }       
        
        
        
        

        
    }
}

<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\QBO;
use App\Models\User;
use \Crypt;
use Hash;
use Auth;
use Session;
use QuickBooksOnline\API\DataService\DataService;

class AuthController extends Controller
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

    // Register a user
    function registerUser(Request $req){
        
        $validateData = $req->validate([
            'fname' => 'required|regex:/^[a-z A-Z]+$/u',
            'lname' => 'required|regex:/^[a-z A-Z]+$/u',
            'email' => 'required|email',
            'password' => 'required|min:6|max:12',
        ]);
        $result = DB::table($this->tbl_users)
        ->where('email',$req->input('email'))
        ->get();
        
        $res = json_decode($result,true);
        
        
        if(sizeof($res)==0){
            $data = $req->input();
            $user = new User;
            $user->fname = $data['fname'];
            $user->lname = $data['lname'];
            $user->email = $data['email'];
            $user->password = \Hash::make($data['password']);
            $user->save();
            $req->session()->flash('register_status','User has been registered successfully');
            $req->session()->put('fname',$data['fname']);
            $req->session()->put('lname',$data['lname']);
            $req->session()->put('email',$data['email']);
            $result = DB::table($this->tbl_users)->where('email',$req->input('email'))->get();
            $req->session()->put('id',$result[0]->id);
            DB::table($this->tbl_company_user)->where('user_email', $req->input('email'))->update(['status' => 1]);
            $usercount = DB::table($this->tbl_company_user)
                    ->where('user_email',$req->input('email'))
                    ->get()->count();
            if($usercount>0){
                return redirect('/company-list');    
            }
            return redirect('/connect-to-qbo');
            //return redirect('/register');
        }
        else{
            $req->session()->flash('register_status','This Email already exists.');
            return redirect('/register');
        }
    }


    //Password Reset Link
    function passwordreset(Request $req){
        
        $validatedData = $req->validate([
            'new' => 'required|min:6',
            'confirm' => 'required|same:new'
        ],[
        'new.required' => 'New password must be at least 6 characters!',
        'confirm.required' => 'New password and confirm password are not same!',
        ]);
        
        if(!empty($req->email)){
            $new = \Hash::make($req->new);
            DB::table($this->tbl_users)->where('email', $req->email)->update(['password' => $new]);
            return redirect('reset-password-success');    
        }
        else{
            $req->session()->flash('error','Error!!!');
            return redirect('reset-password'.base64_encode($req->email));
        }
        
        
        
        
    }

    //Send mail to reset password
    function sendforgetlink(Request $req){
        $email = $req->input('email');
        $result = DB::table($this->tbl_users)
        ->where('email',$req->input('email'))
        ->get();
        $res = json_decode($result,true);
        
        
        if(sizeof($res)==0){
            $req->session()->flash('error','Email Id does not exist. Please register yourself first');
            return redirect('forgot');
        }
        else{
            $req->session()->flash('success','Link send to email id');
            $req->session()->flash('myemail',$email);
            $details = [
                'email' => $email
            ];    
            \Mail::to($email)->send(new \App\Mail\SendReset($details));
            return redirect('forgot-success');
        }

    }

    // Login user
    function loginUser(Request $req){
        $validatedData = $req->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);
        
        $result = DB::table($this->tbl_users)
        ->where('email',$req->input('email'))
        ->get();
        
        $res = json_decode($result,true);
        
        
        if(sizeof($res)==0){
            $req->session()->flash('error','Email Id does not exist. Please register yourself first');
            return redirect('login');
        }
        else{
            
            $encrypted_password = $result[0]->password;
            $credentials = $req->only('email', 'password');
            if(Auth::attempt($credentials)){
                if($result[0]->two_factor == 1){
                    $req->session()->put('id',$result[0]->id);
                    $otp=rand(1111,9999);
                    DB::table($this->tbl_users)->where('id', $result[0]->id)->update(['otp' => $otp]);
                    $details = [
                        'otp' => $otp
                    ];    
                    \Mail::to($result[0]->email)->send(new \App\Mail\SendOtp($details));
                    return redirect('/two-factor-verification');     
                }
                $req->session()->put('fname',$result[0]->fname);
                $req->session()->put('lname',$result[0]->lname);
                $req->session()->put('email',$result[0]->email);
                $req->session()->put('id',$result[0]->id);
                DB::table($this->tbl_company_user)->where('user_email', $req->input('email'))->update(['status' => 1]);
                $usercount = DB::table($this->tbl_company_user)
                    ->where('user_email',$req->input('email'))
                    ->get()->count();
                if($usercount>0){
                    return redirect('/company-list');    
                }
                if(empty($result[0]->role)){
                    $count = DB::table($this->tbl_company)
                    ->where('user_id',$result[0]->id)
                    ->get()->count();
                    //echo $count;
                    
                    if($count>0){
                        return redirect('/company-list'); 
                    }
                    else{
                        return redirect('/connect-to-qbo');    
                    }
                }
                else{
                    return redirect('/company-list');    
                }
                
            }
            else{
                $req->session()->flash('error','Email Or Password Incorrect!!!');
                return redirect('login');
            }
        }
    }


    function verifyotp(Request $req){
        $user_id = Session::get('id');
        $otp = $req->input('otp');
        $result = DB::table($this->tbl_users)->where('id',$user_id)->get();
        if($result[0]->otp == $otp){
            $req->session()->put('fname',$result[0]->fname);
            $req->session()->put('lname',$result[0]->lname);
            $req->session()->put('email',$result[0]->email);
            $req->session()->put('id',$result[0]->id);
            DB::table($this->tbl_company_user)->where('user_email', $req->input('email'))->update(['status' => 1]);
            $usercount = DB::table($this->tbl_company_user)
                ->where('user_email',$req->input('email'))
                ->get()->count();
            if($usercount>0){
                return redirect('/company-list');    
            }
            if(empty($result[0]->role)){
                $count = DB::table($this->tbl_company)
                ->where('user_id',$result[0]->id)
                ->get()->count();
                //echo $count;
                
                if($count>0){
                    return redirect('/company-list'); 
                }
                else{
                    return redirect('/connect-to-qbo');    
                }
            }
            else{
                return redirect('/company-list');    
            }
        }
        else{
            $req->session()->flash('error', 'Otp not verified');
            return redirect('two-factor-verification');    
        }
        
        
    }

    // Logout
    function logout(Request $request) {
        Auth::logout();
        Session::flush();
        return redirect('/login');
    }

    // Change Password
    function changepassword(Request $req){
        $user_id = Session::get('id');
        $user = DB::table($this->tbl_users)->where('id',$user_id)->get();
        $current = $req->current;
        $validatedData = $req->validate([
            'current' => 'required',
            'new' => 'required|min:6|different:current',
            'confirm' => 'required|same:new'
        ],[
        'current.required' => 'You have to enter current passowrd',
        'new.required' => 'New password and current password are same!',
        'current.required' => 'New password and confirm password are not same!',
        ]);
        
        

        $encrypted_password = $user[0]->password;
        $decrypted_password = crypt::decrypt($encrypted_password);
        if( Hash::check($req->current, $user->password)){
            $req->session()->flash('error','Current password not match');
            return redirect('change-password');
        }

        if($req->new != $req->confirm){
            $req->session()->flash('error','Password and confirm password not match');
            return redirect('change-password');
        }

        if($req->new == $req->current){
            $req->session()->flash('error','Current password and new password are same');
            return redirect('change-password');
        }
        $new = \Hash::make($req->new);
        DB::table($this->tbl_users)->where('id', $user[0]->id)->update(['password' => $new]);
        return redirect('change-password-success');
        
    }
}

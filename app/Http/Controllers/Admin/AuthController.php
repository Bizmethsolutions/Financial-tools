<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
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
    function registerUser(Request $req){
        
        $validateData = $req->validate([
            'fname' => 'required|regex:/^[a-z A-Z]+$/u',
            'lname' => 'required|regex:/^[a-z A-Z]+$/u',
            'email' => 'required|email',
            'password' => 'required|min:6|max:12',
        ]);
        $result = DB::table('users')
        ->where('email',$req->input('email'))
        ->get();
        
        $res = json_decode($result,true);
        
        
        if(sizeof($res)==0){
            $data = $req->input();
            $user = new User;
            $user->fname = $data['fname'];
            $user->lname = $data['lname'];
            $user->email = $data['email'];
            $encrypted_password = crypt::encrypt($data['password']);
            $user->password = $encrypted_password;
            $user->save();
            $req->session()->flash('register_status','User has been registered successfully');
            $req->session()->put('fname',$data['fname']);
            $req->session()->put('lname',$data['lname']);
            $req->session()->put('email',$data['email']);
            return redirect('/connect-to-qbo');
            //return redirect('/register');
        }
        else{
            $req->session()->flash('register_status','This Email already exists.');
            return redirect('/register');
        }
    }

    function loginUser(Request $req){
        $validatedData = $req->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);
        
        $result = DB::table('admin')
        ->where('email',$req->input('email'))
        ->get();
        
        $res = json_decode($result,true);
        
        
        if(sizeof($res)==0){
            $req->session()->flash('error','Email Id does not exist. Please register yourself first');
            return redirect('login');
        }
        else{
            
            $encrypted_password = $result[0]->password;
            $decrypted_password = crypt::decrypt($encrypted_password);
            if($decrypted_password==$req->input('password')){
                
                $req->session()->put('type','Admin');
                $req->session()->put('email',$result[0]->email);
                $req->session()->put('id',$result[0]->id);
                return redirect('/cms/dashboard');
                
                
            }
            else{
                $req->session()->flash('error','Password Incorrect!!!');
                return redirect('cms/login');
            }
        }
    }

    function logout(Request $request) {
        Auth::logout();
        Session::flush();
        return redirect('/cms/login');
    }
}

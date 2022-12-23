<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/*Route::get('/', function () {
    return view('welcome');
});
*/

Route::post('get-account','App\Http\Controllers\APIController@GetAccountById');
Route::post('depreciation','App\Http\Controllers\APIController@GetDepreciation');
Route::post('step1','App\Http\Controllers\APIController@savecompanystep1');
Route::post('step2','App\Http\Controllers\APIController@savecompanystep2');
/*User Routes*/
Route::post('register-user','App\Http\Controllers\AuthController@registerUser');
Route::post('login-user','App\Http\Controllers\AuthController@loginUser');
Route::get('two-factor-verification', function () { return view('auth.two-factor-verification'); }); 
Route::post('verifyotp','App\Http\Controllers\AuthController@verifyotp');
Route::post('sendforgetlink','App\Http\Controllers\AuthController@sendforgetlink');

/*Admin Routes*/
Route::post('admin-login-user','App\Http\Controllers\Admin\AuthController@loginUser');


Route::group(['middleware'=>'customAuth'],function(){
    Route::get('dashboard', function () { return view('dashboard'); });
    Route::get('connect-qbo', function () { return view('QBO'); });
    Route::get('connect-to-qbo', function () { return view('connect-to-qbo'); });
    Route::post('connectqbo','App\Http\Controllers\QBOController@connectQBO');
    Route::get('logout','App\Http\Controllers\AuthController@logout');
    Route::get('authorize','App\Http\Controllers\QBOController@authorizeQBO');
    Route::get('companyinfo', function () { return view('companyinfo'); });
    Route::get('logout', 'App\Http\Controllers\AuthController@logout');
    Route::get('company-register', function () { return view('auth.company-register'); });
    
});



/*Admin Backend Routes*/
Route::group(['middleware'=>'customAuth'],function(){

    Route::get('cms/dashboard', function () { return view('admin.dashboard'); });
    //Company Setup And all
    Route::get('company-dashboard', 'App\Http\Controllers\CompanyController@dashboard');
    Route::get('connect-qbo', function () { return view('QBO'); });
    Route::get('connect-to-qbo', function () { return view('connect-to-qbo'); });
    Route::post('connectqbo','App\Http\Controllers\QBOController@connectQBO');
    Route::get('companyinfo', function () { return view('companyinfo'); });
    Route::get('company-register', 'App\Http\Controllers\CompanyController@register');
    Route::get('company-success', function () { return view('company-success'); });
    Route::get('company-error', function () { return view('company-error'); });
    Route::get('company-list', 'App\Http\Controllers\CompanyController@companylist');
    Route::get('/setcompanydata/{id}', 'App\Http\Controllers\QBOController@setcompanydata');
    Route::get('/setcompany/{id}', 'App\Http\Controllers\CompanyController@setcompanydata');
    Route::get('company-profile', function () { return view('company_profile'); });
    Route::get('company_profile', function () { return view('company_profile'); });
    Route::get('quickbook-connection', function () { return view('quickbook-connection'); });  
    Route::post('updatecompany','App\Http\Controllers\CompanyController@updatecompany');
    Route::post('sendinvitation','App\Http\Controllers\CompanyController@sendinvitation');
    Route::post('process','App\Http\Controllers\TransactionController@process');
    Route::get('invite-success', function () { return view('invite-success'); });

    // Transactions Route
    Route::get('transactions', 'App\Http\Controllers\TransactionController@transaction');
    Route::get('edittransactions/{id}', 'App\Http\Controllers\TransactionController@edit');
    Route::post('updatetransaction/{id}', 'App\Http\Controllers\TransactionController@update');
    Route::get('/ignored/{id}', 'App\Http\Controllers\TransactionController@ignored');
    Route::get('/new/{id}', 'App\Http\Controllers\TransactionController@new');
    Route::get('temp', 'App\Http\Controllers\TransactionController@temp');
    
    //Fixed Asset Routes
    Route::get('fixed-asset-register', 'App\Http\Controllers\TransactionController@fixed_asset_register');
    Route::get('fixed-asset-detail/{id}', 'App\Http\Controllers\FixedAssetController@fixed_asset_detail');
    Route::get('upload-historical-data', function () { return view('upload-historical-data'); });
    Route::post('import-historical-data', 'App\Http\Controllers\CompanyController@import');
    Route::get('dispose-assets', 'App\Http\Controllers\FixedAssetController@dispose');
    Route::post('fixed-asset-search', 'App\Http\Controllers\FixedAssetController@fixed_asset_search');
    
    

    Route::get('logout','App\Http\Controllers\AuthController@logout');
    Route::get('authorize','App\Http\Controllers\QBOController@authorizeQBO');
    Route::get('logout', 'App\Http\Controllers\AuthController@logout');
    Route::post('changepassword', 'App\Http\Controllers\AuthController@changepassword');
    Route::get('settings', function () { return view('settings'); });
    Route::get('fixed-assets', function () { return view('fixed_assets'); });
    Route::get('preferences', function () { return view('preferences'); });
    Route::get('chart-of-accounts', function () { return view('chart-of-accounts'); });

    // User Routing
    //Route::get('user-list', function () { return view('user-list'); });
    Route::get('user-list', 'App\Http\Controllers\UserController@userlist');
    Route::get('add-user', function () { return view('Add_user'); });  
    Route::post('adduser','App\Http\Controllers\UserController@adduser');
    Route::get('/edituser/{id}', 'App\Http\Controllers\UserController@edit');
    Route::get('/linkuser/{id}', 'App\Http\Controllers\UserController@link');
    Route::get('/unlinkuser/{id}', 'App\Http\Controllers\UserController@unlink');
    Route::post('updateuser/{id}', 'App\Http\Controllers\UserController@update');
    Route::get('/deleteuser/{id}', 'App\Http\Controllers\UserController@delete');
    Route::get('user-update-success', function () { return view('user-update-success'); });
    Route::get('user-update-error', function () { return view('user-update-error'); });
    Route::get('user-delete-success', function () { return view('user-delete-success'); });
    Route::get('user-delete-error', function () { return view('user-delete-error'); });
    Route::get('user-add-success', function () { return view('user-add-success'); });
    Route::get('user-add-error', function () { return view('user-add-error'); });


    
    Route::get('email-preferences', function () { return view('email_preferences'); });

    //Profile Routing
    Route::get('profile','App\Http\Controllers\ProfileController@profile');
    Route::post('profile-update','App\Http\Controllers\ProfileController@profile_update');
    Route::get('profile-success', function () { return view('profile-success'); });  
    Route::get('profile-error', function () { return view('profile-error'); });  

    //2Factor Routing
    Route::get('2-factor', 'App\Http\Controllers\SettingController@index');  
    Route::post('factorsave','App\Http\Controllers\SettingController@save');
    Route::get('2-factor-stop', function () { return view('2-step-stop'); });  
    Route::get('2-factor-success', function () { return view('2-factor-success'); });  
    Route::get('2-factor-deactive', function () { return view('2-factor-deactive'); });



    
    Route::get('delete', function () { return view('delete'); });  
    Route::get('invoice', function () { return view('invoice'); });  
    Route::get('change-password', function () { return view('change-password'); });  
    Route::get('change-password-success', function () { return view('change-password-success'); });  
    Route::get('subscription', function () { return view('subscription'); });  
});

Route::group(['middleware'=>'sessionCheck'],function(){
    Route::get('/', function () {
        return view('auth.login');
    });
    Route::get('cms', function () {
        return view('admin.login');
    });
    Route::get('cms/login', function () {
        return view('admin.login');
    });
    Route::post('passwordreset','App\Http\Controllers\AuthController@passwordreset');
    Route::get('login', function () { return view('auth.login'); });
    Route::get('register', function () { return view('auth.register'); });
    Route::get('forgot', function () { return view('auth.forgot'); });
    Route::get('forgot-success', function () { return view('auth.forgot-success'); });
    Route::get('reset-password/{email}', function () { return view('auth.reset-password'); });
    Route::get('reset-password-success', function () { return view('auth.reset-password-success'); });
    
});
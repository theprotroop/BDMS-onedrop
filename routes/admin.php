<?php
use Illuminate\Support\Facades\Route;
Route::group([
    'prefix'=>'admin', 
    'namespace'=>'App\Http\Controllers\Admin', 
    'middleware'=>['web']], function(){
        
    Route::get('/login', 'Auth\LoginController@showLoginForm')->name('admin.login');
    Route::post('/', 'Auth\LoginController@validateLogin')->name('admin.login.submit');
    Route::get('/forgotPassword', 'Auth\ForgotPasswordController@showForgotPassword')->name('admin.forgotPassword');
    Route::post('/sendVerificationCode/{email}', 'Auth\ForgotPasswordController@verifyEmail');
    Route::get('/verify/{typedCode}/{email}', 'Auth\ForgotPasswordController@verifyCode');
    Route::get('/resetPassword/{typedCode}/{email}/{password}', 'Auth\ForgotPasswordController@resetPassword');

    Route::post('/auth/register', 'Auth\RegisterController@registerAdmin');
    
    Route::group(['middleware' => ['auth:admin']], function () {
    
    Route::post('/logout', 'Auth\LoginController@logout')->name('admin.logout');
    
    //dashboard routes
    Route::group(['prefix' => 'dashboard'], function () {
    
    //url to dashboard page
    Route::get('/', 'DashboardController@index')->name('admin.dashboard');

    //profile management routes
    Route::post('/changeProfilePhoto/{id}', 'profileController@changeProfilePhoto');
    Route::get('/fetchProfile/{id}', 'profileController@fetchProfile');
    Route::put('/updateProfile/{id}', 'profileController@updateProfile');
    Route::put('/changePassword/{id}', 'profileController@changePassword');

    //staff management routes
    Route::get('/staff', 'staffController@index')->name('admin.staff');
    Route::post('/insertStaff', 'staffController@addStaff');
    Route::get('/fetchStaff', 'staffController@fetchStaff');
    Route::get('/fetchActiveStaff', 'staffController@fetchActiveStaff');
    Route::get('/fetchInactiveStaff', 'staffController@fetchInactiveStaff');
    Route::get('/searchStaff/{input}', 'staffController@searchStaff');
    Route::get('/fetchSingleStaff/{id}', 'staffController@fetchSingleStaff');
    Route::put('/changeStatus/{id}', 'staffController@changeStatus');
    Route::post('/updateStaff/{id}', 'staffController@updateStaff');
    Route::delete('/deleteStaff/{id}', 'staffController@deleteStaff');

    //hospital management routes
    Route::get('/hospital', 'hospitalController@index')->name('admin.hospital');
    });

    });

    
   
});
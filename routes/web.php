<?php

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
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/', function () {
    return view('welcome');
});

Auth::routes(['register'=>false]);
Route::get('/verify', 'VerifyController@index');
Route::post('/verify', 'VerifyController@verify')->name('verifyotp');
Route::get('/signup/{phone_number}', 'ProfileController@index')->name('signup.phone_number');
Route::post('/signup', 'ProfileController@info')->name('signup');
Route::get('/register', 'PhoneController@create')->name('register');
Route::post('/register', 'PhoneController@store')->name('register.store');


Route::get('/account', 'AccountController@index')->name('account');
Route::get('/edit', 'UserController@index')->name('edit');
Route::post('/edit', 'AccountController@update')->name('edit');












Route::get('/phone', function() {
    return view('phoneno');
});
// Route::resource('verify', 'VerifyController');
// Route::post('verify', 'VerifyController@validateOtp')->name('verify.otp');
// Route::get('user/info/{id}', 'VerifyController@userRegister')->name('user.register');

// Auth::routes();

//

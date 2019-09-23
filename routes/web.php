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

//this is for the phone controller and view.
Route::get('/register', 'PhoneController@create')->name('register');
Route::post('/register', 'PhoneController@store')->name('register.store');

// route for profile
Route::get('/account', 'AccountController@index')->name('account');
Route::get('/edit', 'AccountController@show')->name('edit');
Route::post('/edit', 'ProfileController@update')->name('update');

// route to groups
Route::get('/groups', 'GroupController@index')->name('groups');
Route::get('/createGroup', 'GroupController@create')->name('createGroup');
Route::post('/createGroup', 'GroupController@store')->name('createGroupPost');
Route::get('/addMember', 'GroupController@addMember')->name('addMember');
Route::get('/searchPhone/{group}', 'GroupController@searchPhone')->name('searchPhone');
Route::post('/searchPhone', 'GroupController@searchPhoneNumber')->name('searchPhoneNumber');
// Route::resource('/group', 'GroupController');

// route to change password
Route::get('/changePassword', 'PasswordController@Form');
Route::post('/changePassword','PasswordController@changePassword')->name('changePassword');

// route to bank details
Route::get('/bankinfo', 'BankController@index')->name('bankinfo');
Route::post('/bankinfo', 'BankController@store')->name('bankinfo');


// route to card details
Route::get('/cardCreate', 'UserController@cardCreate')->name('cardCreate');
Route::get('/createcard', 'UserController@createCard')->name('createcard');
Route::get('/chargecard/{person}', 'PaymentController@chargeCard');

// invite route
Route::get('/invite', 'InviteController@index')->name('invite');
Route::post('/invite', 'InviteController@sendInvite')->name('invite.send');
Route::get('/join/{code}', 'InviteController@join')->name('invite.join');

// payment route
Route::post('/pay', 'PaymentController@redirectToGateway')->name('pay');
Route::get('/payment/callback', 'PaymentController@handleGatewayCallback');

// transaction route
Route::get('/transaction', 'TransactionController@index')->name('transaction');
Route::get('/transactions', 'TransactionController@view')->name('transactions');

// ajax
Route::get('/get-group/{groupId}', 'HomeController@getGroupUsers');
Route::get('/get-first-group', 'HomeController@getFirstGroup');
Route::post('/group-invite', 'InviteController@inviteGroup');

Route::post('/addGroupRequest', 'GroupController@addGroupRequest');
Route::get('/addGroupAccept/{requestId} ', 'GroupController@addGroupAccept')->name('acceptRequest');

// notifications
Route:: get('/notifications', 'NotificationsController@index')->name('notifications');





Route::get('/phone', function() {
    return view('phoneno');
});

// Route::resource('verify', 'VerifyController');
// Route::post('verify', 'VerifyController@validateOtp')->name('verify.otp');
// Route::get('user/info/{id}', 'VerifyController@userRegister')->name('user.register');

// Auth::routes();

//

<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';


    // protected $phone;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
        // $this->phone = $this->findPhone();
    }
    /**
    * Get phone to be used by controller
    // */
    // public function findPhone()
    // {
    //     $login = request()->input('login');
    //     $fieldType = filter_var($login, FILTER_VALIDATE_EMAIL) ? 'email' : 'phone';
    //     return $fieldType;
    // }
    // /**
    // * get phone prop
    // */
    // public function phone()
    // {
    //     return $this->phone;
    // }
}

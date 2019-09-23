<?php

namespace App\Http\Controllers;

use Hash;
use Auth;
use App\User;
use Illuminate\Http\Request;

class PasswordController extends Controller
{
    public function Form()
    {
        return view('auth.changePassword');
    }

    public function _construct()
    {
        $this->middleware('auth');
    }

    public function changePassword(Request $request)
    {
        if(!Hash::check($request->get('current-password'), Auth::user()->password)) {

            return redirect()->back()->with("error", "Your current password does not match. Try again.");
        }

        if(strcmp($request->get('current-password'), $request->get('password')) == 0) {
            return redirect()->back()->with("error", "New Password cannot be the same with old password.");
        }

        $validate = $request->validate([
            'current-password' => 'required',
            'password' => 'required|string|min:6|confirmed',
        ]);
        $user = User::where('id', Auth::user()->id)->first();
        $user->password = bcrypt($request->get('password'));
        if($user->save()){
            return redirect('/home');
        }

    }
}

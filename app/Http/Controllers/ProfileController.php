<?php

namespace App\Http\Controllers;

use App\User;
use Auth;
use App\Phone;
use App\Profile;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($phone_number)
    {
        if(Auth::check()){
            return redirect('/home');
        }
        return view('signup')->with('phone_number', $phone_number);
    }

public function info(Request $request)
{
    $phone = Phone::where('phone_number', $request->phone_number)
    ->whereNotNull('verified_at')->first();

    if($phone == null){
        return redirect('register');
    }

    $info = $request->validate([
        'firstname' => 'required|string|max:120|min:2',
        'lastname' => 'required|string|max:120',
        'dob' => 'required',
        'bvn' => 'required|numeric|unique:users',
        'email' => 'email|unique:users|required',
        'phone_number' => 'required|string|unique:users,phone|max:120',
        'password' => 'required|string|max:120|confirmed',
    ]);
    $user = new User;
    $user->firstname = $request->firstname;
    $user->lastname = $request->lastname;
    $user->dob = $request->dob;
    $user->bvn = $request->bvn;
    $user->email = $request->email;
    $user->phone = $request->phone_number;
    $user->password = bcrypt($request->password);
    $user->verification_code = '3';

    if($user->save()){
        $credentials = $request->only('email', 'phone', 'password');

        if (Auth::attempt($credentials)) {
            if(session('code')){
                return redirect('/join/'.session('code'));
            }else{
                return redirect('/home');
            }

        }


    }else{
        echo ('not successful');
    }
}
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function show(Profile $profile)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function edit(Profile $profile)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Profile $profile)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function destroy(Profile $profile)
    {
        //
    }
}

<?php

namespace App\Http\Controllers;

use App\Invite;
use App\User;
use Illuminate\Http\Request;
use URL;
use App\Referral;
use Auth;
class InviteController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $user = User::findOrFail(auth()->user()->id);
        $referral_code = $this->generateRandomString();
        // see his invite referal_code
        if($user->referral_link == NULL){
            $user->referral_link = substr($user->firstname, 0, 2).$referral_code;
            $user->save();
        }
        // if he doesnt have then one is generateRandomString


        $link = URL::to('/join/'.$user->referral_link);

        return view('internals.invite')->with('referral_link', $link);
    }

    public function generateRandomString($length = 4) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }
    // to join a group
    public function joinGroup(){
        // check if phone number exists and logged in

        // redirect to login

        //redirect to joinGroup
    }
    public function join($code){
        // check to get the user with that code
        if(!Auth::check()){
            session()->forget('code');
            session()->put('code', $code);
            return redirect('/register');
        }
        $inviter = User::where('referral_link', $code)->first();
        if($inviter == null){
            return redirect('/home')->with('error', 'Referral Code does not exist');
        }
        $referral = new Referral;
        $referral->inviter = $inviter->id;
        $referral->invitee = auth()->user()->id;
        $referral->save();

        return redirect('/home');

    }
    // to join the app


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
     * @param  \App\Invite  $invite
     * @return \Illuminate\Http\Response
     */
    public function show(Invite $invite)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Invite  $invite
     * @return \Illuminate\Http\Response
     */
    public function edit(Invite $invite)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Invite  $invite
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Invite $invite)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Invite  $invite
     * @return \Illuminate\Http\Response
     */
    public function destroy(Invite $invite)
    {
        //
    }
}

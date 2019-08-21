<?php

namespace App\Http\Controllers;

use Auth;
use Session;
use App\User;
use App\Verify;
use App\Phone;
use Carbon\Carbon;
use Illuminate\Http\Request;

class VerifyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return view('verify');
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

    public function verify(Request $request)
    {
        $verified = Phone::get()->where('verification_code', $request->verification_code);

        if($verified->count() == 0){
            return redirect()->back()->with('status', 'verification code is incorrect');
        }else{
            $phone = Phone::get()->where('verification_code', $request->verification_code)->first();
            $phone->verified_at = Carbon::now();
            if($phone->save()){
                return redirect()->route('signup.phone_number', $phone->phone_number);
            }

        }
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    /**
     * Display the specified resource.
     *
     * @param  \App\Verify  $verify
     * @return \Illuminate\Http\Response
     */
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Verify  $verify
     * @return \Illuminate\Http\Response
     */
    public function edit(Verify $verify)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Verify  $verify
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Verify $verify)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Verify  $verify
     * @return \Illuminate\Http\Response
     */
    public function destroy(Verify $verify)
    {
        //
    }
}

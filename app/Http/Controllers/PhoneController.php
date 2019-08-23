<?php

namespace App\Http\Controllers;

use Validator;
use App\Phone;
use Illuminate\Http\Request;
use Auth;

class PhoneController extends Controller
{

    public function create()
    {
        if(Auth::check()){
            return redirect('/home');
        }
        return view('phoneno');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'phone_number' => 'required|unique:users,phone|string',
        ]);

        if($validator->fails()){
            return redirect()->back()->with('error', $validator->errors());
        }

        $phone = new Phone;
        $phone->phone_number = $request->phone_number;
        $phone->verification_code = mt_rand(1000, 9999);
        if($phone->save()){
            // dd([$request->phone_number, $phone->verification_code]);
            // $send = file_get_contents("http://www.smsmobile24.com/index.php?option=com_spc&comm=spc_api&username=mercyN&password=vQtXTSPCTZTd2dZ&sender=".urlencode("ajo")."&recipient=".urlencode($request->phone_number)."&message=".$phone->verification_code."&");

            return redirect('verify')->with('status', $phone->verification_code);
        }else{
            return redirect()->back()->with('error', 'Could not register you');
        }

    }

}

<?php

namespace App\Http\Controllers;

use App\BankName;
use App\Bank;
use Validate;
use Illuminate\Http\Request;

class BankController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bankname = BankName::get();
        return view('internals.bankinfo')->with('bankme', $bankname);
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
        $bank = $request->validate([
            'bank_name' => 'required',
            'account_name' => 'required|string|max:120',
            'account_no' => 'required|numeric|unique:banks',
        ]);
        // dd($bank);

        $bank = new Bank;

        $bank->bank_name_id = $request->bank_name;
        $bank->account_name = $request->account_name;
        $bank->account_no = $request->account_no;
        $bank->user_id = auth()->user()->id;

       if($bank->save()){
        return redirect()->back()->with('success', 'Bank account has been added');

       } else{
        return redirect()->back()->with('error', 'something went wrong, Try again');
       }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Bank  $bank
     * @return \Illuminate\Http\Response
     */
    public function show(Bank $bank)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Bank  $bank
     * @return \Illuminate\Http\Response
     */
    public function edit(Bank $bank)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Bank  $bank
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Bank $bank)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Bank  $bank
     * @return \Illuminate\Http\Response
     */
    public function destroy(Bank $bank)
    {
        //
    }
}

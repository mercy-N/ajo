<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{

    public function cardCreate()
    {
        return view('internals.cardCreate');
    }
    public function createCard()
    {
        return view('transaction.saveCard');
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Group;
use DB;
use App\Request as InviteRequest;


class NotificationsController extends Controller
{
   public function index()
   {
         $invites = InviteRequest::where('receiver', auth()->user()->phone)->get();
         return view('internals.notifications')->with('invites', $invites);

   }

}



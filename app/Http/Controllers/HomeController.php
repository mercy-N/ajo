<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Group;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user = User::find(auth()->user()->id);
        $groups = $user->group()->get();
        $transactions = $user->transaction()->get();

        return view('home')->with(['groups' => $groups, 'transactions' => $transactions, 'user' => $user]);

    }
    public function getGroupUsers($groupId)
    {
        $group = Group::find($groupId);
        $users = $group->user()->get();
        // return response()->json($users);
        return response()->json([$users, $group]);
    }
    public function getFirstGroup()
    {
        $user = User::find(auth()->user()->id);
        $group = $user->group()->first();
        $users = $group->user()->get();
        // return response()->json($users);
        return response()->json([$users, $group]);
    }
}

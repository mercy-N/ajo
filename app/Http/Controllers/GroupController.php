<?php

namespace App\Http\Controllers;

use App\Group;
use Auth;
use Blade;
use App\GroupUser;
use App\User;
use Illuminate\Http\Request;

class GroupController extends Controller
{
    public function __construct()
    {
        //
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = User::findOrFail(auth()->user()->id);
        $groups = $user->group()->get();
        return view('internals.groups')->with(['groups'=> $groups, 'users'=>$user]);
    }

    public function getOrder($group, $user){
        return GroupUser::get()
        ->where('user_id', $user)
        ->where('group_id', $group);

    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('internals.createGroup');


    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $group = $request->validate([
            'name'=>'string|required|max:120',
            'no_of_users'=>'required',
            'amount'=>'required|numeric',
        ]);
        $group = new Group;
        $group->name = $request->name;
        $group->no_of_users = $request->no_of_users;
        $group->amount = $request->amount;
        $group->cycle = 0;
        $group->is_active = 1;
        if($group->save()){
            $group_user = new GroupUser;
            $group_user->group_id = $group->id;
            $group_user->user_id = auth()->user()->id;
            $group_user->is_admin = true;
            $group_user->order_of_members = rand(1, $group->no_of_users);
            if($group_user->save()){
                return redirect()->back()->with('success', 'Group created succcessfully');
            }else{
                return redirect()->back()->with('error', 'Something went wrong, please try again');
            }
        }else{
            return redirect()->back()->with('error', 'Something went wrong, please try again!');
        }
        return redirect()->back()->with('error', 'You tried');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Group  $group
     * @return \Illuminate\Http\Response
     */
    public function show(Group $group)
    {
        //
    }
    public function joinGroup(Request $request)
    {
        //check for group ; check for user ; assuming user exists ; tie group to user;
        $group = Group::findOrFail($request->group);
        // $user = User::findOrFail($request->user);
        $groupuser = new GroupUser;

        $groupuser->user_id = $request->user;
        $groupuser->group_id = $request->group;
        $groupuser->is_admin = false;
        $groupuser->order_of_members = rand(1, $group->no_of_users);

        if($groupuser->save()){
            return redirect()->back()->with('success', 'You have Join this group');
        }else{
            return redirect()->back()->with('error', 'You could not Join this group');
        }
    }


    public function searchPhone(Request $request, $group)
    {
        Blade::if('phonefound', function(){
            return session('phonefound');
        });
        return view('internals.searchPhone')->with('group', $group);
    }

    public function searchPhoneNumber(Request $request)
    {

        $user = User::where('phone', $request->phone)
        ->whereNotIn('phone', [auth()->user()->phone])
        ->first();
        if($user == null){
            $url = "send invite";
            $user = $request->phone;
        }else{
            $url = "add to group";
        }
        return redirect()->back()->with(['phonefound'=>true, 'status'=>$url, 'userPhone'=>$user]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Group  $group
     * @return \Illuminate\Http\Response
     */
    public function edit(Group $group)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Group  $group
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Group $group)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Group  $group
     * @return \Illuminate\Http\Response
     */
    public function destroy(Group $group)
    {
        //
    }
}

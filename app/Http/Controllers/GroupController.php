<?php

namespace App\Http\Controllers;

use App\Group;
use Auth;
use Blade;
use DB;
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
* creates a request and sends to the user
*/
public function addGroupRequest(Request $request)
{
    if($this->checkRequest($request->group, $request->phone)){
        return 'already';
    }{
        $user = User::where('phone', $request->phone)->first();
        $addGroup = DB::table('request')->insert([
          'sender' => auth()->user()->id,
          'receiver' => $request->phone,
          'group_id' => $request->group,
          'status' => 0,
        ]);
        if($addGroup){
            return 'done';
        }else{
            return 'failed';
        }
    }

}

public function checkRequest($group, $receiver)
{
    $checkRequest = DB::table('request')
    ->where('group_id', $group)
    ->where('receiver', $receiver)
    ->first();
    if($checkRequest == null){
        return false;
    }else{
        return true;
    }
}

/**
* Adds the user to the group when the user
* has accepted an invite to join a group
*/
public function addGroupAccept($requestId)
{
    //get the request id
    // query the request
    //update the status to true
    // create a group_user detail
    $addGroupAccept = DB::table('request')
    ->where('id', $requestId);

    if($addGroupAccept->first() != null){
        $addGroupAccept->update(['status' => true]);
    }

    if($this->joinGroupToo($addGroupAccept->first())){
        return redirect()->back()->with('success', 'You have Join this group');
    }else{
        return redirect()->back()->with('error', 'You could not Join this group');
    }
}
    public function joinGroupToo($request)
    {
        // dd($request);

        //check for group ; check for user ; assuming user exists ; tie group to user;
        $group = Group::findOrFail($request->group_id);
        $life = $this->randomOrder($group->no_of_users, $request->group_id);
        // dd($life);
        // $user = User::findOrFail($request->user);
        $groupuser = new GroupUser;
        // $this->checkMemberOrder($groupy)
        $user = User::where('phone', $request->receiver)->first();
        if($groupuser->where('user_id', $user->id)->where('group_id', $group->id)->exists()){
            return redirect()->back()->with('error', 'You are alreday in the group');
        }
        $groupuser->user_id = $user->id;
        $groupuser->group_id = $request->group_id;
        $groupuser->is_admin = false;
        $groupuser->order_of_members = $life;

        return $groupuser->save();


    }

    public function randomOrder($max, $groupId)
    {
        $maxValues = [];
        for ($x = 1; $x <= $max; $x++) {
            $maxValues[] = $x;
        }
        $order = rand(1, $max);
        $life = $this->checkMemberOrder($order, $max, $groupId, $maxValues);
        return $life;
    }


    public function checkMemberOrder($order, $max, $gid, $maxValues)
    {
        $countMembers = GroupUser::where('group_id', $gid)->count();
        if($countMembers == $max){
            dd('cant join');
        }else{

            // dd('can');
            $getAvailableNumber = GroupUser::where('group_id', $gid)->whereIn('order_of_members', $maxValues)->pluck('order_of_members')->toArray();
            // dd($getAvailableNumber);
            $array1 = $getAvailableNumber;
            $array2 = $maxValues;
            $diff_result = array_diff($array2, $array1);
            $availableOrderNumber = (array_flatten($diff_result));
        }


        // $grouporder = GroupUser::where('group_id', $gid)
        // ->where('order_of_members', $order)
        // ->exists();
        // $groupuser = new GroupUser;
        // dd($grouporder);

        if ($availableOrderNumber){
            return $availableOrderNumber[0];
        }else{
            die('no space available');
        }

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
    // check to see if the user exists in a group
    public function checkGroupUserExists($request){
        $request=$request->first();
        $user = User::where('phone', $request->receiver)->first();
        $group = GroupUser::where('user_id', $user->id)->where('group_id', $request->group_id)->first();
        return $group;

    }
}

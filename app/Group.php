<?php

namespace App;
use App\Group;
use App\User;
use Illuminate\Database\Eloquent\Model;

class Group extends Model
{


    public function groupUsers()
    {
        return $this->belongsToMany(Group::class, 'group_users');
    }
    // specify a relationship directly to users
    public function user()
    {
        return $this->belongsToMany(User::class, 'group_users');
    }

}

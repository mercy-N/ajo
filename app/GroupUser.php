<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Group;
use App\User;

class GroupUser extends Model
{
    protected $table = "group_user";

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function group()
    {
        return $this->belongsTo(Group::class);
    }
}

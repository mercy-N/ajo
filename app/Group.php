<?php

namespace App;
use App\Group;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    public function groupUsers()
    {
        return $this->belongsToMany(Group:: class, 'group_user');
    }
}

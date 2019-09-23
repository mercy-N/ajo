<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Group;

class Request extends Model
{
    public function sendingParty()
    {
        return $this->belongsTo(User::class, 'sender', 'id');
    }

    public function group()
    {
        return $this->belongsTo(Group::class);
    }
}

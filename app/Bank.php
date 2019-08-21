<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bank extends Model
{
    public function bankName()
    {
        return $this->hasOne(BankName::class);
    }

    public function user()
    {
        return $this->belongsToMany(User::class);
    }
}

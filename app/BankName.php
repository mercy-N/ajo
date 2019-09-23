<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BankName extends Model
{
    public function bank()
    {
        return $this->belongsToMany(Bank::class);
    }
}

<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Request;
use App\Transaction;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'image', 'phone'
        // 'phone', 'verification_code',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    public function userGroups()
    {
        return $this->belongsToMany(User::class, 'group_user');
    }

    public function profile()
    {
        return $this->hasOne(Profile::class);
    }

    public function bank()
    {
        return $this->belongsToMany(Bank::class);
    }

    public function card()
    {
        return $this->belongsToMany(Card::class);
    }
    public function group()
    {
        return $this->belongsToMany(Group::class, 'group_users');
    }

    public function reqs()
    {
        return $this->hasMany(Request::class, 'sender');
    }

    public function transaction()
    {
        return $this->hasMany(Transaction::class);
    }
}

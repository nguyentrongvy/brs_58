<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','gender','birthday','image','role'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function follow()
    {
        return $this->hasMany('\App\Follow', 'follower_id');
    }

    public function suggest()
    {
        return $this->hasMany('\App\Suggest', 'user_id');
    }

    public function read()
    {
        return $this->hasMany('\App\Read', 'user_id');
    }

    public function comment()
    {
        return $this->hasMany('\App\Comment', 'user_id');
    }

    public function rate()
    {
        return $this->hasMany('\App\Rate', 'user_id');
    }

    public function review()
    {
        return $this->hasMany('\App\Review', 'user_id');
    }

    public function favorite()
    {
        return $this->hasMany('\App\Favorite', 'user_id');
    }
}

<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;
    protected $table = "users";

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'fname', 'email', 'password', 'mobile', 'lname'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function rss()
    {
        return $this->hasMany('App\Rss');
    }

    public function role()
    {
        return $this->belongsTo('App\Role');
    }

    public function getrol()
    {
        return $this->role->name;
    }

    public function posts()
    {
        return $this->hasMany('App\Post');
    }
}

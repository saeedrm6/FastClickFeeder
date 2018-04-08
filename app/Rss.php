<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rss extends Model
{
    protected $table = "rss";
    protected $fillable = [
        'name', 'url', 'homepage', 'logo', 'user_id'
    ];

    public function categories()
    {
        return $this->belongsToMany('App\Category');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function history()
    {
        return $this->hasOne('App\RssHistory');
    }

    public function posts()
    {
        return $this->hasMany('App\Post');
    }

}

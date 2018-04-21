<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public $timestamps = false;
    protected $table = "categories";
    protected $fillable = [
        'name', 'slug',
    ];

    public function rss()
    {
        return $this->belongsToMany('App\Rss');
    }

    public function homebox()
    {
        return $this->hasOne('App\HomeBox');
    }

}

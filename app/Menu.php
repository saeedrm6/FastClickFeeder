<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    public $timestamps = false;
    public $table = 'menu';
    protected $fillable = ['name'];

    public function tags()
    {
        return $this->belongsToMany('App\Tag');
    }
}

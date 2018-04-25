<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Listt extends Model
{
    public $timestamps = false;
    public $table = 'listt';
    protected $fillable = ['name','permalink','icon'];

    public function menus()
    {
        return $this->belongsToMany('App\Menu');
    }
}

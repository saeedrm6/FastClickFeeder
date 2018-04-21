<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HomeBox extends Model
{
    public $timestamps = false;
    protected $table = "homebox";
    protected $fillable = [
        'category_id','periorty'
    ];

    public function Category()
    {
        return $this->belongsTo('App\Category','category_id','id');
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Post;

class PostMeta extends Model
{
    protected $table ='postmeta';
    protected $fillable = [
        'post_id','meta_key','meta_value'
    ];
    public $timestamps = false;

    public function post()
    {
        return $this->belongsTo('App\Post','post_id','id');
    }

}

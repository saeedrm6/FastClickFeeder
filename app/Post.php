<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $table = 'posts';
    protected $fillable = [
        'user_id','rss_id','title','content','excerpt','status','comment_status','post_type','permalink'
    ];

    public function user()
    {
        return $this->belongsTo('App\User','user_id','id');
    }

    public function rss()
    {
        return $this->belongsTo('App\Rss','rss_id','id');
    }

    public function tags(){
        return $this->belongsToMany('App\Tag');
    }

}

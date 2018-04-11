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

    public function postmetas()
    {
        return $this->hasMany('App\PostMeta');
    }

    public function getview(Post $post)
    {
        return $post->postmetas('meta_key','views')->first()->meta_value;
    }

    public function setview($postid)
    {
        $view = PostMeta::where('post_id',$postid)->where('meta_key','views')->first();
        $view->meta_value = $view->meta_value + 1;
        $view->update();
    }

}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PostTag extends Model
{
    public $table = 'post_tag';
    protected $fillable = ['post_id','tag_id'];
    public $timestamps = false;
    
}

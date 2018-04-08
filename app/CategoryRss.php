<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CategoryRss extends Model
{
    protected $table ='category_rss';
    protected $fillable = ['category_id','rss_id'];
}

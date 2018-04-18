<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MenuTag extends Model
{
    public $timestamps = false;
    public $table = 'menu_tag';
    protected $fillable = ['menu_id','tag_id'];
}

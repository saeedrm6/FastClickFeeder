<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ListtMenu extends Model
{
    public $timestamps = false;
    public $table = 'listt_menu';
    protected $fillable = ['list_id','menu_id'];

}

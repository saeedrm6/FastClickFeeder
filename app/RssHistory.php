<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RssHistory extends Model
{
    protected $table = "rsshistory";
    protected $fillable = [
        'rss_id','body','version','latest_version'
    ];
    public $timestamps = false;

    public function rss()
    {
        return $this->belongsTo('App\Rss','rss_id','id');
    }
}

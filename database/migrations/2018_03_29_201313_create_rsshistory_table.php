<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRsshistoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
//        Schema::create('rsshistory', function (Blueprint $table) {
//            $table->increments('id');
//            $table->integer('rss_id')->unsigned();
//            $table->longText('body');
//
//            $table->foreign('rss_id')->references('id')->on('rss');
//        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
//        Schema::dropIfExists('rsshistory');
    }
}

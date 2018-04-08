<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRssTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
//        Schema::create('rss', function (Blueprint $table) {
//            $table->increments('id');
//            $table->string('name');
//            $table->string('url');
//            $table->string('homepage');
//            $table->string('logo');
//            $table->integer('user_id')->unsigned();
//            $table->rememberToken();
//            $table->timestamps();
//
//            $table->foreign('user_id')->references('id')->on('users');
//        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rss');
    }
}

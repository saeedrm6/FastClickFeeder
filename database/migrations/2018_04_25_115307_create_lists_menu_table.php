<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateListsMenuTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('listt_menu', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('listt_id')->unsigned();
            $table->integer('menu_id')->unsigned();

            $table->foreign('listt_id')->references('listt')->on('id');
            $table->foreign('menu_id')->references('menu')->on('id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('list_menu');
    }
}

<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
//        Schema::create('users', function (Blueprint $table) {
//            $table->increments('id');
//            $table->string('name');
//            $table->string('email')->unique();
//            $table->string('password');
//            $table->rememberToken();
//            $table->string('fname')->nullable();
//            $table->string('lname')->nullable();
//            $table->string('mobile')->nullable();
//            $table->string('amount')->nullable();
//            $table->integer('role_id')->default(2);
//            $table->foreign('role_id')->references('id')->on('roles');
//            $table->timestamps();
//
//
//        });

        Schema::table('users', function (Blueprint $table) {

        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
//        Schema::dropIfExists('users');
    }
}

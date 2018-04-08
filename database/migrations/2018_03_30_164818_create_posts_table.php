<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Schema::create('posts', function (Blueprint $table) {
        //     $table->increments('id');
        //     $table->integer('user_id')->default(1)->nullable()->unsigned();
        //     $table->integer('rss_id')->nullable();
        //     $table->string('title')->nullable();
        //     $table->longText('content')->nullable();
        //     $table->string('excerpt')->nullable();
        //     $table->string('status')->default('publish')->nullable();
        //     $table->string('comment_status')->default('open')->nullable();
        //     $table->string('post_type')->nullable();
        //     $table->string('permalink')->nullable();
        //     $table->timestamps();

        //     $table->foreign('user_id')->references('user')->on('id');
        //     $table->foreign('rss_id')->references('rss')->on('id');
        // });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // Schema::dropIfExists('posts');
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->dateTime('published_time')->nullable();
            $table->boolean('is_article')->nullable(true);
            $table->boolean('is_poll')->nullable(true);
            $table->foreignId('user_id')->constrained();
            $table->year('group_id');
            $table->foreign('group_id')->references('year')->on('groups');
            $table->boolean('is_deleted')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('posts');
    }
}

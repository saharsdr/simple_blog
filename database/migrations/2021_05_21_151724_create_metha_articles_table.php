<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMethaArticlesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('metha_articles', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->foreignId('article_id')->constrained();
            $table->string('text');
            $table->tinyInteger('type');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('metha_articles');
    }
}

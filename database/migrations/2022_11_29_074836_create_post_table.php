<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('post', function (Blueprint $table) {
            $table->increments(column:'postID');
            $table->string(column:'postTitle');
            $table->string(column:'postDecraption');
            $table->tinyInteger(column:'postStatus');
            $table->date(column:'postDate');
            $table->integer(column:'adminID');
            $table->integer(column:'userID');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('post');
    }
}

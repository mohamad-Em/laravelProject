<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReplyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reply', function (Blueprint $table) {
            $table->increments(column:'replyID');
            $table->string(column:'replyTitle');
            $table->date(column:'replyDate');
            $table->integer(column:'adminID');
            $table->integer(column:'userID');
            $table->integer(column:'commentID');
            $table->integer(column:'complaintID');
            $table->integer(column:'messageID');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('reply');
    }
}

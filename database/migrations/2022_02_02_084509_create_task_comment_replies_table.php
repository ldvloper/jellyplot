<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTaskCommentRepliesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('task_comment_replies', function (Blueprint $table) {
            $table->id();
            //Max Length 500 characters
            $table->string('reply', 500);
            //Relations
            $table->foreignId('user_id')->constrained()->onDelete('cascade')->onUpdate('cascade');;
            $table->foreignId('task_comment_id')->constrained()->onDelete('cascade')->onUpdate('cascade');;
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('task_comment_replies');
    }
}

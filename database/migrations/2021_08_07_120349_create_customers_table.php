<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->id();
            //Fill
            $table->string('name');
            $table->text('site')->nullable();
            $table->foreignId('department_id')->constrained()->onDelete('cascade')->onUpdate('cascade');;
            //CRUD
            $table->foreignId('creator_id');
            $table->foreignId('editor_id')->nullable();
            //TIMESTAMPS
            $table->timestamps();
            //SoftDeletes
            $table->softDeletes();
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('customers');
    }
}

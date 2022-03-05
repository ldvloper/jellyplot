<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEquipmentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('equipment', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('sn')->unique();
            $table->string('brand');
            $table->string('model');
            $table->string('version')->nullable();
            //Reservation
            $table->boolean('reserved');
            //RS
            $table->foreignId('department_id')->constrained()->onDelete('cascade')->onUpdate('cascade');
            //CRUD
            $table->foreignId('creator_id');
            $table->foreignId('editor_id')->nullable();
            //TIMESTAMPS
            $table->timestamps();
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
        Schema::dropIfExists('equipment');
    }
}

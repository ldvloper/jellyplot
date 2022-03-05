<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTasksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tasks', function (Blueprint $table) {
            $table->id();
            //Data
            $table->string('title');
            $table->text('notes')->nullable();
            //Dates
            $table->date('start');
            $table->date('end');
            //RS
            $table->foreignId('department_id')->constrained()->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('team_id')->constrained()->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('project_id')->constrained()->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('resource_id')->constrained()->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('test_manager_id')->nullable();
            $table->foreignId('technician_id')->nullable();
            $table->foreignId('equipment_id')->nullable();
            //Shift
            $table->foreignId('shift_id')->constrained()->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('tasks');
    }
}

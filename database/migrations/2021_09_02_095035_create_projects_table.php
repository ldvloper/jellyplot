<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            //Data
            $table->string('reference')->unique();
            $table->string('color');
            $table->longText('notes')->nullable();
            //Associations
            $table->foreignId('project_manager_id')->constrained('users')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('department_id')->constrained()->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('customer_id')->constrained()->onDelete('cascade')->onUpdate('cascade');
            //Dates
            $table->dateTime('sample_reception')->nullable();
            $table->dateTime('deadline')->nullable();
            //Costs
            $table->integer('billing_status');
            $table->integer('total_cost');
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
        Schema::dropIfExists('projects');
    }
}

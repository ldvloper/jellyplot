<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateResourcesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('resources', function (Blueprint $table) {
            $table->id();
            //Identification
            $table->bigInteger('order_planning');
            $table->string('name')->unique();
            $table->string('color');
            //Department
            $table->foreignId('department_id');
            //Analytics
            $table->float('price_hour')->default(0.00);
            //CRUD
            $table->foreignId('creator_id');
            $table->foreignId('editor_id')->nullable();
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
        Schema::dropIfExists('resources');
    }
}

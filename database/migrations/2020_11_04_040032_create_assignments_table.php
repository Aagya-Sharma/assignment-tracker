<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAssignmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    
        {
        
            Schema::create('assignments', function (Blueprint $table) {
                $table->bigIncrements('id');
                $table->bigInteger('group_id')->unsigned();
               
                $table->integer('user_id');
                $table->string('title');
                $table->string('description')->nullable();
                $table->string('resources')->nullable();
                $table->integer('points');
                $table->string('class');
                $table->date('date');
                $table->time('time')->nullable;
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
        Schema::dropIfExists('assignments');
    }
}

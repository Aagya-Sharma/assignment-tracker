<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('assignment_id')->unsigned();
            $table->bigInteger('user_id')->unsigned();
            $table->bigInteger('teacher_id')->unsigned();
            $table->bigInteger('assignments_points')->unsigned();
            $table->integer('percentage')->nullable();
            $table->string('feedback')->nullable();
            $table->string('name');
            $table->string('work');
            $table->integer('points')->nullable();
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
        Schema::dropIfExists('students');
    }
}

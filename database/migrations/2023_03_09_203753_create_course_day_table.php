<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('course_day', function (Blueprint $table) {
            $table->unsignedBigInteger('course_id');
            $table->unsignedBigInteger('day_id');
            $table->time('open_time');
            $table->time('close_time');
            $table->string('building')->comment('bina kodu: END, MED');
            $table->string('room')->comment('derslik: A204, D205');
            $table->timestamps();
        });

        Schema::table('course_day',function (Blueprint $table){
            $table->foreign('course_id')->references('id')->on('courses');
            $table->foreign('day_id')->references('id')->on('days');
            $table->primary(['course_id','day_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('course_day');
    }
};

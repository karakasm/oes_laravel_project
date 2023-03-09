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
        Schema::create('courses', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('instructor_id');
            $table->string('name')->comment('Financial Mathematic');
            $table->string('code', 3)->comment('MAT');
            $table->string('number',4)->comment('471');
            $table->enum('language', ['Turkish','English']);
            $table->text('aim');
            $table->text('content');
            $table->tinyInteger('credit');
            $table->unsignedInteger('capacity');
            $table->unsignedInteger('enrolled');
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
        Schema::dropIfExists('courses');
    }
};

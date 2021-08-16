<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatCourse extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('course', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable;
            $table->string('icon')->nullable;
            $table->text('description')->nullable();
            $table->integer('learners')->default(0);
            $table->integer('lessons')->default(0);
            $table->float('times')->nullable();
            $table->bigInteger('quizzes')->nullable();
            $table->float('price')->default(0);
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
        Schema::dropIfExists('course');
    }
}

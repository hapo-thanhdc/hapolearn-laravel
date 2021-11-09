<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateCourseTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('course', function (Blueprint $table) {
            $table->dropColumn(['lessons', 'times']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
    **/
    public function down()
    {
        Schema::table('course', function (Blueprint $table) {
            $table->float('times')->nullable();
            $table->integer('lessons')->default(0);
        });
    }
}

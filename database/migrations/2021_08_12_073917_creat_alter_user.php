<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatAlterUser extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->integer('role')->default(0);
            $table->string('avatar')->nullable();
            $table->string('phone')->nullable();
            $table->date('date_of_birth')->nullable();
            $table->string('address')->nullable();
            $table->text('about_me')->nullable();
            $table->string('background')->nullable();
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
        Schema::table('users', function (Blueprint $table) {
            $table->dropIfExists('role');
            $table->dropIfExists('avatar');
            $table->dropIfExists('phone');
            $table->dropIfExists('date_of_birth');
            $table->dropIfExists('address');
            $table->dropIfExists('about_me');
        });
    }
}

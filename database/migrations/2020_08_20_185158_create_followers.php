<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFollowers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('followers', function (Blueprint $table) {

            $table->unsignedBigInteger('leader_user_id');
            $table->foreign('leader_user_id')->references('id')->on('users');

            $table->unsignedBigInteger('follower_user_id');
            $table->foreign('follower_user_id')->references('id')->on('users');

            $table->primary(['leader_user_id','follower_user_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('followers');
    }
}

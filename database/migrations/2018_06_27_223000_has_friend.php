<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class HasFriend extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('has_friend', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_sender');
            $table->integer('user_receiver');
            $table->boolean('status')->nullable();
            $table->timestamps();

            $table->foreign('user_sender')->references('id')->on('users');
            $table->foreign('user_receiver')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('has_friend');
    }
}

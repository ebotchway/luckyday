<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlayerscoresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('playerscores', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('pid')->unsigned();
            $table->bigInteger('#1_win')->unsigned()->nullable();
            $table->bigInteger('#1_question')->unsigned()->nullable();
            $table->bigInteger('#2_win')->unsigned()->nullable();
            $table->bigInteger('#2_question')->unsigned()->nullable();
            $table->bigInteger('#3_win')->unsigned()->nullable();
            $table->bigInteger('#3_question')->unsigned()->nullable();
            $table->timestamps();

            //foreign key
            $table->foreign('pid')->references('id')->on('games')->onDelete('cascade');
            $table->foreign('#1_win')->references('id')->on('prizes')->onDelete('cascade');
            $table->foreign('#2_win')->references('id')->on('prizes')->onDelete('cascade');
            $table->foreign('#3_win')->references('id')->on('prizes')->onDelete('cascade');
            $table->foreign('#1_question')->references('id')->on('questions')->onDelete('cascade');
            $table->foreign('#2_question')->references('id')->on('questions')->onDelete('cascade');
            $table->foreign('#3_question')->references('id')->on('questions')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('playerscores');
    }
}

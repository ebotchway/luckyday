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
            $table->string('#1_win');
            $table->string('#1_question');
            $table->string('#2_win')->nullable();
            $table->string('#2_question')->nullable();
            $table->string('#3_win')->nullable();
            $table->string('#3_question')->nullable();
            $table->timestamps();

            //foreign key
            $table->foreign('pid')->references('id')->on('players')->onDelete('cascade');
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

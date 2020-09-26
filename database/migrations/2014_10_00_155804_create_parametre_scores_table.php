<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateParametreScoresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('parametre_scores', function (Blueprint $table) {
            $table->increments('id');
            $table->string('parametre');
            $table->integer('score4');
            $table->integer('score3');
            $table->integer('score2');
            $table->integer('score1');
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
        Schema::drop('parametre_scores');
    }
}

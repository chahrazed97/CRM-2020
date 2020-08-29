<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMessgProspectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('messg_prospects', function (Blueprint $table) {
            $table->increments('id');
            $table->string('destination');
            $table->string('subject');
            $table->longtext('msg');
            $table->unsignedInteger('prospect_id');
            $table->foreign('prospect_id')->references('id')->on('prospect')->nullable()->default(0);
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
        Schema::drop('messg_prospects');
    }
}

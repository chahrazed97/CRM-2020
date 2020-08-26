<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMessgClientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('messg_clients', function (Blueprint $table) {
            $table->increments('id');
            $table->string('destination');
            $table->string('subject');
            $table->longtext('msg');
            $table->unsignedInteger('clients_id');
            $table->foreign('clients_id')->references('id')->on('clients')->nullable()->default(0);
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
        Schema::drop('messg_clients');
    }
}

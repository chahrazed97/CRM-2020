<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMessgsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('messgs', function (Blueprint $table) {
            $table->increments('id');
            $table->string('destination');
            $table->string('subject');
            $table->longtext('msg');
            $table->string('type');
            $table->integer('type_id');
            $table->unsignedInteger('admin_id');
            $table->foreign('admin_id')->references('id')->on('users')->nullable()->default(1);
            $table->timestamps();
            $table->dateTime('deleted_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('messgs');
    }
}

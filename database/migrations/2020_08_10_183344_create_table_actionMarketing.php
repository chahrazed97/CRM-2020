<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableActionMarketing extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('actionMarketing', function (Blueprint $table) {
            $table->increments('id');
            $table->string('titre');
            $table->integer('segment');
            $table->text('description');
            $table->text('action_marketing');
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
        Schema::dropIfExists('action_marketing');
    }
}

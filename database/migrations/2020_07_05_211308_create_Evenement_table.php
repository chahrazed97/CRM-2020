<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEvenementTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Evenement', function (Blueprint $table) {
            $table->increments('id');
            $table->string('titre');
            $table->dateTime('date');
            $table->text('localisation');
            $table->text('description');
            $table->string('status')->default('non_partagé');
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
        Schema::dropIfExists('Evenement');
    }
}

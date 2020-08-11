<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProspectTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Prospect', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nom');
            $table->string('prenom');
            $table->string('phone');
            $table->string('email', 255);
            $table->text('adresse');
            $table->text('code_postal');
            $table->date('date_naissance');
            $table->text('pays');
            $table->string('status');
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
        Schema::dropIfExists('Prospect');
    }
}

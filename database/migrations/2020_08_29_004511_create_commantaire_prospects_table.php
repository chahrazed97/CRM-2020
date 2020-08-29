<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCommantaireProspectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('commentaire_prospects', function (Blueprint $table) {
            $table->text('description');
            $table->date('date_comm');
            $table->unsignedInteger('prospect_id');
            $table->unsignedInteger('employee_id');
            $table->foreign('prospect_id')->references('id')->on('prospect')->nullable()->default(0);
            $table->foreign('employee_id')->references('id')->on('employees')->nullable()->default(0);
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
        Schema::drop('commantaire_prospects');
    }
}

<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHistoriqueProspectTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('HistoriqueProspect', function (Blueprint $table) {
            $table->increments('id');
            $table->string('titre');
            $table->string('type_act');
            $table->date('date_act');
            $table->text('compte_rendu');
            $table->unsignedInteger('prospect_id');
            $table->foreign('prospect_id')->references('id')->on('Prospect')->nullable()->default(0);
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
        Schema::table('HistoriquePorspect', function(Blueprint $table) {
            $table->dropForeign('HistoriqueProspect_prospect_id_foreign');
		
		});
        Schema::dropIfExists('HistoriqueProspect');
    }
}

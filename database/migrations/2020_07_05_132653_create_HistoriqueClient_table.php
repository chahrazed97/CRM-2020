<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHistoriqueClientTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('HistoriqueClient', function (Blueprint $table) {
            $table->increments('id');
            $table->string('titre');
            $table->string('type_act');
            $table->date('date_act');
            $table->text('compte_rendu');
            $table->string('organisateur')->nullable()->default('client');
            $table->unsignedInteger('clients_id');
            $table->foreign('clients_id')->references('id')->on('clients')->nullable()->default(0);
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
        Schema::table('HistoriqueClient', function(Blueprint $table) {
            $table->dropForeign('HistoriqueClient_clients_id_foreign');
			
		});
        Schema::dropIfExists('HistoriqueClient');
    }
}

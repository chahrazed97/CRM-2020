<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCommandeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Commande', function (Blueprint $table) {
            $table->increments('id');
            $table->string('num_comm');
            $table->date('date_comm');
            $table->string('mode_payement');
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
        Schema::dropIfExists('Commande');
        Schema::table('Commande', function(Blueprint $table) {
            $table->dropForeign('Commande_clients_id_foreign');
			
		});
        
    }
}

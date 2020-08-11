<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCommandeProduitTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('commande_produit', function(Blueprint $table) {
			$table->increments('id');
			$table->unsignedInteger('commande_id');
			$table->unsignedInteger('produit_id');
			$table->foreign('commande_id')->references('id')->on('Commande')
						->onDelete('restrict')
						->onUpdate('restrict');

			$table->foreign('produit_id')->references('id')->on('Produit')
						->onDelete('restrict')
						->onUpdate('restrict');
		});
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('commande_produit', function(Blueprint $table) {
			$table->dropForeign('commande_produit_commande_id_foreign');
			$table->dropForeign('commande_produit_produit_id_foreign');
		});

		Schema::drop('commande_produit');
	}
    
}

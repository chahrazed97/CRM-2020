<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProduitTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Produit', function (Blueprint $table) {
            $table->increments('id');
            $table->string('ref_prod');
            $table->string('type');
            $table->float('prix');
            $table->float('taux_tva');
            $table->unsignedInteger('commande_id');
            $table->foreign('commande_id')->references('id')->on('Commande')->nullable()->default(0);
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
        Schema::table('Produit', function(Blueprint $table) {
            $table->dropForeign('Produit_commande_id_foreign');
		
		});
        Schema::dropIfExists('Produit');
    }
}

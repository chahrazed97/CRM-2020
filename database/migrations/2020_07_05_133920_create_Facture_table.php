<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFactureTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Facture', function (Blueprint $table) {
            $table->increments('id');
            $table->string('num_fac');
            $table->date('date_fac');
            $table->float('total');
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
        Schema::table('Facture', function(Blueprint $table) {
            $table->dropForeign('Facture_commande_id_foreign');
			
		});
        Schema::dropIfExists('Facture');
    }
}

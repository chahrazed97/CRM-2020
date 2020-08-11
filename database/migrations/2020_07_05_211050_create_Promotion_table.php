<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePromotionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Promotion', function (Blueprint $table) {
        $table->increments('id');
        $table->string('titre');
        $table->date('start_date');
        $table->date('end_date');
        $table->unsignedInteger('produit_id');
        $table->integer('pourcetage_promo');
        $table->foreign('produit_id')->references('id')->on('Produit')->nullable()->default(0);
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
        Schema::table('Promotion', function(Blueprint $table) {
            $table->dropForeign('Promotion_Produit_id_foreign');
		});
        Schema::dropIfExists('Promotion');
    }
}

<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReclamationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Reclamation', function (Blueprint $table) {
            $table->increments('id');
            $table->text('description');
            $table->date('date_rec');
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
        Schema::table('Reclamation', function(Blueprint $table) {
            $table->dropForeign('Reclamation_clients_id_foreign');
		
		});
        Schema::dropIfExists('Reclamation');
    }
}

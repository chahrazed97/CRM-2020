<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCommentaireTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Commentaire', function (Blueprint $table) {
            $table->increments('id');
            $table->text('description');
            $table->date('date_comm');
            $table->unsignedInteger('clients_id');
            $table->unsignedInteger('employee_id');
            $table->foreign('clients_id')->references('id')->on('clients')->nullable()->default(0);
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
        Schema::table('Commentaire', function(Blueprint $table) {
            $table->dropForeign('Commentaire_clients_id_foreign');
			$table->dropForeign('Commentaire_employee_id_foreign');
		});
        Schema::dropIfExists('Commentaire');
    }
}

<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateActiviteTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Activites', function (Blueprint $table) {
            $table->increments('id');
            $table->string('titre');
            $table->string('type_activite');
            $table->string('status')->nullable()->default('planifié');
            $table->datetime('date_act');
            $table->text('description');
            $table->unsignedInteger('employee_id');
            $table->unsignedInteger('clients_id');
            $table->foreign('employee_id')->references('id')->on('employees')->nullable()->default(0);
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
        Schema::table('Activite', function(Blueprint $table) {
            $table->dropForeign('Activite_client_id_foreign');
			$table->dropForeign('Activite_employee_id_foreign');
		});
        Schema::dropIfExists('Activites');
    }
}

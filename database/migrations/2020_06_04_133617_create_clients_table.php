<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clients', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nom');
            $table->string('prenom');
            $table->string('phone');
            $table->string('email', 255);
            $table->text('metier');
            $table->text('adresse');
            $table->text('code_postal');
            $table->date('date_naissance');
            $table->text('pays');
            $table->string('status')->default('non_active');
            $table->unsignedInteger('employee_id')->nullable()->default(0);
            $table->unsignedInteger('admin_id');
            $table->unsignedInteger('pays_id');
            $table->foreign('employee_id')->references('id')->on('employees');
            $table->foreign('admin_id')->references('id')->on('users')->nullable()->default(1);
            $table->foreign('pays_id')->references('id')->on('pays');
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
        Schema::table('clients', function(Blueprint $table) {
           
			$table->dropForeign('clients_employee_id_foreign');
		});
        Schema::dropIfExists('clients');
    }
}

<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProspectTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Prospect', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nom');
            $table->string('prenom');
            $table->string('phone');
            $table->string('email', 255);
            $table->text('adresse');
            $table->text('code_postal');
            $table->date('date_naissance');
            $table->text('pays');
            $table->text('situation_famille');
            $table->text('nbr_enfant');
            $table->text('niveau_etude');
            $table->text('profile_professionnel');
            $table->text('niveau_salaire');
            $table->boolean('Voyageur');
            $table->text('Activité préféré');
            $table->string('status')->default('non_active');
            $table->unsignedInteger('employee_id')->nullable()->default(0);
            $table->unsignedInteger('admin_id');
            $table->foreign('employee_id')->references('id')->on('employees');
            $table->foreign('admin_id')->references('id')->on('users')->nullable()->default(1);
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
        Schema::table('Prospect', function(Blueprint $table) {
           
			$table->dropForeign('Prospect_employee_id_foreign');
		});
        Schema::dropIfExists('Prospect');
    }
}

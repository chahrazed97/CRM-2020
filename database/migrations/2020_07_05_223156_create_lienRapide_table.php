<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLienRapideTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lienRapide', function (Blueprint $table) {
            $table->increments('id');
            $table->string('titre');
            $table->text('lien');
            $table->unsignedInteger('employee_id');
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
        Schema::table('lienRapide', function(Blueprint $table) {
			$table->dropForeign('lienRapide_employee_id_foreign');
		});
        Schema::dropIfExists('lienRapide');
    }
}

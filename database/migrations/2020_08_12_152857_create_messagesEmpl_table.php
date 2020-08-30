<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMessagesEmplTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('messagesEmpl', function (Blueprint $table) {
            $table->increments('id');
            $table->date('date_msg');
            $table->text('message');
            $table->string('answered')->nullable()->default('no');
            $table->unsignedInteger('send_emp_id');
            $table->unsignedInteger('receiv_emp_id');
            $table->foreign('send_emp_id')->references('id')->on('employees');
            $table->foreign('receiv_emp_id')->references('id')->on('employees');
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
        Schema::table('messagesEmpl', function(Blueprint $table) {
            $table->dropForeign('messagesEmpl_send_emp_id_foreign');
            $table->dropForeign('messagesEmpl_receiv_emp_id_foreign');
		});
        Schema::dropIfExists('messagesEmpl');
    }
}

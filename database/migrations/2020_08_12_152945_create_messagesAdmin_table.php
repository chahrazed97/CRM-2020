<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMessagesAdminTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('messagesAdmin', function (Blueprint $table) {
            $table->increments('id');
            $table->date('date_msg');
            $table->text('message');
            $table->unsignedInteger('send_emp_id');
            $table->unsignedInteger('receiv_admin_id');
            $table->foreign('send_emp_id')->references('id')->on('employees');
            $table->foreign('receiv_admin_id')->references('id')->on('users');
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
        Schema::table('messagesAdmin', function(Blueprint $table) {
            $table->dropForeign('messagesEmpl_send_emp_id_foreign');
            $table->dropForeign('messagesEmpl_receiv_admin_id_foreign');
		});
        Schema::dropIfExists('messagesAdmin');
    }
}

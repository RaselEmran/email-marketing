<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmailListTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('email_list', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('group_id')->unsigned();
//            $table->foreign('group_id')->references('id')->on('group')->onDelete('cascade');
            $table->string('name', 70)->nullable();
            $table->string('email', 2255);
            $table->tinyInteger('free_email_check');
            $table->text('free_email_value');
            $table->tinyInteger('bulk_check');
            $table->text('bulk_value');
            $table->tinyInteger('email_list_check');
            $table->text('email_list_value');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('email_list');
    }
}

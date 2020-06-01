<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGroupTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('group', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 70);
            $table->tinyInteger('status');
            $table->tinyInteger('free_email_check');
            $table->string('free_email_check_date', 100);
            $table->tinyInteger('bulk_check');
            $table->string('bulk_check_date', 100);
            $table->tinyInteger('email_list_check');
            $table->text('email_list_verify_date', 100);
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
        Schema::drop('group');
    }
}

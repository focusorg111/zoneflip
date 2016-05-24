<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('user_id');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('user_name');
            $table->string('password');
            $table->string('contact_no');
            $table->string('user_type');
            $table->Integer('user_type');
            $table->Integer('contact_phone');


            $table->Integer('user_type');
            $table->rememberToken();
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
        schema::drop('users');
    }
}

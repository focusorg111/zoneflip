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
<<<<<<< HEAD:database/migrations/2016_05_23_093930_create_users_table.php
            $table->string('contact_no');
            $table->string('user_type');
=======
            $table->Integer('user_type');
            $table->Integer('contact_phone');
>>>>>>> db530cdbac973086a25d6a6289814eac18b8dede:database/migrations/2014_10_12_000000_create_users_table.php
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

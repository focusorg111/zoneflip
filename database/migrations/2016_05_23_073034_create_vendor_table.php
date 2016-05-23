<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVendorTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('vendor', function (Blueprint $table) {
            $table->increments('vendor_id');
            $table->string('description');
            $table->string('address', 150);
            $table->integer('user_id')->unsigned();
            $table->rememberToken();
            $table->timestamps();


            $table->foreign('user_id')
                ->references('user_id')->on('users')
                ->onDelete('cascade');

        });


    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('vendor', function (Blueprint $table) {
            $table->dropForeign('vendor_user_id_foreign');

        });

        Schema::drop('vendor');
    }
}

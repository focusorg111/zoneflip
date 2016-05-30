<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVendorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vendors', function (Blueprint $table) {
            $table->increments('vendor_id');
            $table->string('description');
            $table->string('address', 150);
            $table->integer('user_id')->unsigned();
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
        Schema::table('vendors', function (Blueprint $table) {
            $table->dropForeign('vendors_user_id_foreign');

        });

        Schema::drop('vendors');
    }

}

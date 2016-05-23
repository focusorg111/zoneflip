<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnToVendorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('vendors', function (Blueprint $table) {
            $table->string('company_name');
            $table->date('register_date');
            $table->boolean('is_approved');

        });
    }


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('vendors', function($table)
        {
            $table->dropColumn('company_name');
            $table->dropColumn('register_date');
            $table->dropColumn('is_approved');
        });
    }

}

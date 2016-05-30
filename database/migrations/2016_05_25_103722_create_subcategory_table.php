<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSubcategoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subcategories', function (Blueprint $table) {
            $table->increments('subcategory_id');
            $table->string('subcategory_name');
            $table->boolean('is_active');
            $table->integer('category_id')->unsigned();
            $table->timestamps();


            $table->foreign('category_id')
                ->references('category_id')->on('categories')
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
        Schema::table('subcategories', function (Blueprint $table) {
            $table->dropForeign('subcategories_category_id_foreign');

        });

        Schema::drop('subcategories');
    }

}


<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('product_id');
            $table->string('product_name');
            $table->text('product_description');
            $table->integer('price');
            $table->integer('quantity');
            $table->string('product_size');
            $table->integer('discount');
            $table->integer('category_id')->unsigned();
            $table->integer('subcategory_id')->unsigned();
            $table->integer('created_by')->unsigned();
            $table->integer('updated_by')->unsigned();
            $table->timestamps();




            $table->foreign('category_id')
                ->references('category_id')->on('categories')
                ->onDelete('cascade');

            $table->foreign('subcategory_id')
                ->references('subcategory_id')->on('subcategories')
                ->onDelete('cascade');


            $table->foreign('created_by')
                ->references('user_id')->on('users')
                ->onDelete('cascade');

            $table->foreign('updated_by')
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
        Schema::table('products', function (Blueprint $table) {
            $table->dropForeign('products_category_id_foreign');
            $table->dropForeign('products_subcategory_id_foreign');
            $table->dropForeign('products_created_by_foreign');
            $table->dropForeign('products_updated_by_foreign');
        });

        Schema::drop('products');
    }

}

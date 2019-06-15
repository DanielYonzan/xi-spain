<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductCategorysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_categorys', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('category')->unsigned();
            $table->integer('product')->unsigned();
            $table->timestamps();

            $table->foreign('category')->references('id')->on('categorys')->ondelete('cascade')->onupdate('cascade');
            $table->foreign('product')->references('id')->on('products')->ondelete('cascade')->onupdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('product_categorys');
    }
}

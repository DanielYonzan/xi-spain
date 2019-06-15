<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name_en');
            $table->string('name_sp');
            $table->float('size');
            $table->varchar('unit');
            $table->float('price');
            $table->float('units_per_case');
            $table->float('cases_per_palet');
            $table->float('cases_per_palet_layer');
            $table->float('palets_per_20_container');
            $table->float('self_life');
            $table->string('origin');
            $table->integer('min_order');
            $table->string('image');
            $table->string('short_description_en');
            $table->string('short_description_sp');
            $table->boolean('status');
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
        Schema::dropIfExists('products');
    }
}

<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAgentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('agents', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('country')->unsigned();
            $table->string('city');
            $table->integer('category')->unsigned();
            $table->string('name');
            $table->string('image');
            $table->string('email');
            $table->string('website');
            $table->string('skype');
            $table->string('whatsapp');
            $table->timestamps();

            $table->foreign('category')->references('id')->on('categorys')->ondelete('cascade')->onupdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('agents');
    }
}

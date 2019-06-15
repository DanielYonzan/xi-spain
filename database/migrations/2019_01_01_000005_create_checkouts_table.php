<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCheckoutsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('checkouts', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('event')->unsigned();
            $table->string('name');
            $table->string('email');
            $table->float('price');
            $table->dateTime('date');
            $table->boolean('status');
            $table->timestamps();

            $table->foreign('event')->references('id')->on('events')->ondelete('cascade')->onupdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('checkouts');
    }
}

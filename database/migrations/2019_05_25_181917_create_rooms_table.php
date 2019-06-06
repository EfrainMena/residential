<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRoomsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rooms', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('number');
            $table->integer('level');
            $table->string('status', 20);
            $table->boolean('active')->default(1);
            $table->unsignedInteger('category_id');
            $table->unsignedInteger('price_id');
            $table->foreign('category_id')->references('id')->on('categories');
            $table->foreign('price_id')->references('id')->on('prices');
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
        Schema::dropIfExists('rooms');
    }
}

<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClientRoomTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('client_room', function (Blueprint $table) {
            $table->increments('id');
            $table->date('date');
            $table->time('hour');
            $table->string('user_username');
            $table->string('user_name');
            $table->unsignedInteger('client_id');
            $table->unsignedInteger('room_id');
            $table->foreign('client_id')->references('id')->on('clients');
            $table->foreign('room_id')->references('id')->on('rooms');
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
        Schema::dropIfExists('client_room');
    }
}

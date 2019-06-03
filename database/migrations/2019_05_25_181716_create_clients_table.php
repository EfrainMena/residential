<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clients', function (Blueprint $table) {
            $table->increments('id');
            $table->string('document', 20);
            $table->string('name', 100);
            $table->string('surnames', 100);
            $table->date('birthdate');
            $table->string('profession', 50);
            $table->string('civil_state', 20);
            $table->string('origin_country', 20);
            $table->string('origin_departament', 20);
            $table->string('nationality', 20);
            $table->boolean('active')->default(1);
            $table->unsignedInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
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
        Schema::dropIfExists('clients');
    }
}

<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePlayersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('players', function (Blueprint $table) {
            $table->string('PlayerID',6)->primary();
            $table->string('Name',50)->nullable();
            $table->date('Birthday');
            $table->string('UniID',5)->nullable();
            $table->string('Nic',12)->nullable();
            $table->string('Gender',10)->nullable();
            $table->foreign('UniID')->references('UniID')->on('unis');
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
        Schema::dropIfExists('players');
    }
}

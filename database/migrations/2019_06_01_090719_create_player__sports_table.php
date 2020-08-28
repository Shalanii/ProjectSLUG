<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePlayerSportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('player__sports', function (Blueprint $table) {
            $table->string('PlayerID',6)->nullable();
            $table->string('Sport',50)->nullable();
            $table->primary(['PlayerID','Sport']);
            $table->foreign('Sport')->references('Sport')->on('sports__teams');
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
        Schema::dropIfExists('player__sports');
    }
}

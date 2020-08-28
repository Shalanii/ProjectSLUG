<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEventUnisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('event_unis', function (Blueprint $table) {
            $table->string('EventID',4)->primary();
            $table->string('Uni1',4);
            $table->string('Uni2',4);
            $table->foreign('Uni1')->references('UniID')->on('unis'); 
            $table->foreign('Uni2')->references('UniID')->on('unis');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('event_unis');
    }
}

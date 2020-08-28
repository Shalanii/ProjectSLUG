<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePlayerEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('player__events', function (Blueprint $table) {
            $table->string('EventID',4)->primary();
            $table->string('Round',20)->nullble();
            $table->string('Sport',25)->nullable();
            $table->date('Date');
            $table->time('Time');
            $table->string('Venue',30)->nullable();
            $table->char('Gender')->nullable();
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
        Schema::dropIfExists('player__events');
    }
}

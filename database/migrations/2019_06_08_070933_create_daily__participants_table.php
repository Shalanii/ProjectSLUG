<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDailyParticipantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('daily__participants', function (Blueprint $table) {
            $table->date('Date',5);
            $table->string('UniID',4);
            $table->string('MalePlayers',5);
            $table->string('FemalePlayers',5);
            $table->string('MaleOfficers',2);
            $table->foreign('UniID')->references('UniId')->on('unis');
            $table->primary(['Date','UniID']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('daily__participants');
    }
}

<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBaseballSchedulesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('baseball_schedules', function (Blueprint $table) {
            $table->integer('MatchNo',3);
            $table->string('Group',1);
            $table->string('uniID1',3);
            $table->string('uniID2',3);
            $table->date('date');
            $table->time('time');
            $table->string('venue',15);
            $table->foreign('Group')->references('Group')->on('baseball_men__groups'); 
            $table->foreign('uniID1')->references('uniID')->on('baseball_men__groups');
            $table->foreign('uniID2')->references('uniID')->on('baseball_men__groups');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('baseball_schedules');
    }
}

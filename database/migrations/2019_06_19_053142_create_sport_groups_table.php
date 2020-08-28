<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSportGroupsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sport_groups', function (Blueprint $table) {
            $table->string('Sport',50);
            $table->string('Group',1);
            $table->string('uniID',3);
            $table->string('Gender',5);
            $table->primary(['Sport','Group','uniID']);
            $table->foreign('uniID')->references('UniID')->on('unis');
            $table->foreign('Sport')->references('Sport')->on('sports__teams');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sport_groups');
    }
}

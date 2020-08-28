<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBaseballMenGroupsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('baseball_men__groups', function (Blueprint $table) {
            $table->string('Group',1);
            $table->string('uniID',3);
            $table->primary(['Group','uniID']);
            $table->foreign('uniID')->references('UniID')->on('unis');
             
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('baseball_men__groups');
    }
}

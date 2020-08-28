<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nets', function (Blueprint $table) {
            $table->string('EventID',4);
            $table->string('UniID',3);
            $table->string('Score',2)->nullable();
            $table->char('Result',15)->nullable();
            $table->primary(['EventID','UniID']);
            $table->foreign('EventID')->references('EventID')->on('events'); 
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
        Schema::dropIfExists('nets');
    }
}

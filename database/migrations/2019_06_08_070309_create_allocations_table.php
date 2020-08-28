<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAllocationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('allocations', function (Blueprint $table) {
            $table->string('Lodge',5);
            $table->string('RoomNo',50);
            $table->date('Date');
            $table->string('UniID',4);
            $table->primary(['RoomNo','Date']);
            $table->string('No_Of_Guests',2);
            $table->foreign('Lodge')->references('Lodge')->on('lodeges');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('allocations');
    }
}

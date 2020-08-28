<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLodegesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lodeges', function (Blueprint $table) {
            $table->string('Lodge',5)->primary();
            $table->string('LodgeName',50)->unique();
            $table->string('No_Of_Room',5);
            $table->string('Gender',5);
            $table->string('Guests_Per_Rooms',2);
            $table->string('Player_Official',2);

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('lodeges');
    }
}

<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAddPointsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('add_points', function (Blueprint $table) {
            $table->string('Place',40)->primary();
            $table->string('UniName');
            $table->string('Points',4);
            $table->string('Sport',50);
            $table->string('Teams',4);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('add_points');
    }
}

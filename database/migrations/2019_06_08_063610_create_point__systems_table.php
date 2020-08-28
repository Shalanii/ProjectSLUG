<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePointSystemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('point__systems', function (Blueprint $table) {
            $table->string('Place',40)->primary();
            $table->string('14Teams',2);
            $table->string('13Teams',2);
            $table->string('12Teams',2);
            $table->string('11Teams',2);
            $table->string('10Teams',2);
            $table->string('9Teams',2);
            $table->string('8Teams',2);
            $table->string('7Teams',2);
            $table->string('6Teams',2);
            $table->string('5Teams',2);
            $table->string('4Teams',2);
            $table->string('3Teams',2);
            $table->string('2Teams',2);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('point__systems');
    }
}

<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTeamsPointsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('teams_points', function (Blueprint $table) {
            $table->string('Place',40);
            $table->string('UniName');
            $table->primary(['Place','UniName']);
            $table->string('Points',4);
            $table->string('Sport',50);
            $table->string('Teams',4);
            $table->string('Gender',4);
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
        Schema::dropIfExists('teams_points');
    }
}

<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVolunteerDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('volunteer__details', function (Blueprint $table) {
            $table->string('VolunteerID',4)->primary();
            $table->string('Name',50);
            $table->string('StudentRegNum',15);
            $table->string('Faculty',15);
            $table->string('Committy',50);
            $table->string('PhoneNumber',10);
            $table->string('Email',30);
            $table->string('Gender',4);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('volunteer__details');
    }
}

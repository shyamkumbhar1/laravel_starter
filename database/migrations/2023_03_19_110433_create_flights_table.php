<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('flights', function (Blueprint $table) {
            $table->id();
            $table->string('airline');
            $table->string('airline_code');
            $table->integer('flight_number');
            $table->string('origin');
            $table->integer('available_seats');
            $table->string('destination');
            $table->integer('price');
            $table->dateTime('departure');
            $table->dateTime('duration');
            $table->json('operationalDays');
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
        Schema::dropIfExists('flights');
    }
};

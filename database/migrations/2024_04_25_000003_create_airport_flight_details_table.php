<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('airport_flight_details', function (Blueprint $table) {
            $table->id();
            $table->foreignId('booking_id')->constrained('airport_bookings')->onDelete('cascade');
            $table->string('flight_number');
            $table->dateTime('flight_time');
            $table->string('airline');
            $table->string('terminal');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::dropIfExists('airport_flight_details');
    }
};

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('airport_luggage_details', function (Blueprint $table) {
            $table->id();
            $table->foreignId('booking_id')->constrained('airport_bookings');
            $table->integer('large_bags')->default(0);
            $table->integer('medium_bags')->default(0);
            $table->integer('small_bags')->default(0);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('airport_luggage_details');
    }
};

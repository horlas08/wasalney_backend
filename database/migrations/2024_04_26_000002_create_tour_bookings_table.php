<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('tour_bookings', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users');
            $table->foreignId('departure_id')->constrained('tour_destinations');
            $table->foreignId('destination_id')->constrained('tour_destinations');
            $table->integer('adults')->comment('Over 10 years old');
            $table->integer('children')->comment('2-10 years old');
            $table->date('departure_date');
            $table->date('return_date');
            $table->integer('hotel_stars')->comment('1-5 stars');
            $table->text('additional_notes')->nullable();
            $table->enum('status', ['PENDING', 'PROCESSING', 'CONFIRMED', 'CANCELLED'])->default('PENDING');
            $table->text('admin_notes')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::dropIfExists('tour_bookings');
    }
};

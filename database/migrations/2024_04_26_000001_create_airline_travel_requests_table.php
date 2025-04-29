<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('airline_travel_requests', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('departure_city');
            $table->string('arrival_city');
            $table->date('departure_date');
            $table->date('return_date')->nullable();
            $table->integer('number_of_passengers');
            $table->string('travel_class')->nullable();
            $table->string('trip_type')->nullable();
            $table->text('special_requirements')->nullable();
            $table->string('status')->default('PENDING');
            $table->text('admin_notes')->nullable();
            $table->unsignedBigInteger('airport_service_type_id')->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('airport_service_type_id')->references('id')->on('airport_service_types')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('airline_travel_requests');
    }
}; 
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
        Schema::table('airport_flight_details', function (Blueprint $table) {
            $table->dateTime('driver_arrival_time')->after('flight_time');
            $table->enum('flight_type', ['ARRIVAL', 'DEPARTURE'])->after('terminal');
            $table->string('ticket_number')->nullable()->after('flight_type');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('airport_flight_details', function (Blueprint $table) {
            $table->dropColumn(['driver_arrival_time', 'flight_type', 'ticket_number']);
        });
    }
};

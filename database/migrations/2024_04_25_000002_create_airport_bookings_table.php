<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('airport_bookings', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('service_type_id');
            $table->foreign('service_type_id')->references('id')->on('airport_service_types');
            $table->foreignId('driver_id')->nullable()->constrained('ar_drivers');
            $table->enum('booking_type', ['ONE_WAY', 'ARRIVAL', 'ROUND_TRIP']);
            $table->string('pickup_location');
            $table->decimal('pickup_lat', 10, 8)->nullable();
            $table->decimal('pickup_lng', 10, 8)->nullable();
            $table->dateTime('booking_date');
            $table->integer('adults')->default(1);
            $table->integer('children')->default(0);
            $table->integer('infants')->default(0);
            $table->text('customer_notes')->nullable();
            $table->decimal('base_fare', 10, 2);
            $table->decimal('urgent_booking_fee', 10, 2)->default(0);
            $table->decimal('waiting_charges', 10, 2)->default(0);
            $table->decimal('total_fare', 10, 2);
            $table->enum('status', ['PENDING', 'ASSIGNED', 'IN_PROGRESS', 'COMPLETED', 'CANCELLED']);
            $table->string('cancellation_reason')->nullable();
            $table->decimal('cancellation_charge', 10, 2)->default(0);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::table('airport_bookings', function (Blueprint $table) {
            $table->dropForeign(['service_type_id']);
            $table->dropForeign(['driver_id']);
        });
        Schema::dropIfExists('airport_bookings');
    }
};

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('airport_service_types', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('name_ar');
            $table->enum('type', ['ECONOMY', 'STANDARD', 'VIP', 'CVIP']);
            $table->decimal('base_price', 10, 2);
            $table->decimal('price_per_km', 10, 2);
            $table->integer('free_waiting_time')->default(60); // in minutes
            $table->decimal('waiting_price_per_hour', 10, 2)->default(5000);
            $table->integer('max_passengers');
            $table->boolean('active')->default(true);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::dropIfExists('airport_service_types');
    }
};
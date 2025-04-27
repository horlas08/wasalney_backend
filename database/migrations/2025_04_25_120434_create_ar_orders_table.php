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
        Schema::create('ar_orders', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('parent_slug')->nullable();
            $table->integer('parent_id')->nullable();
            $table->bigInteger('sort');
            $table->integer('report_id');
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrentOnUpdate()->useCurrent();
            $table->string('stop_time')->nullable();
            $table->string('origin_lat')->nullable();
            $table->string('origin_long')->nullable();
            $table->string('origin_address')->nullable();
            $table->string('destination_lat')->nullable();
            $table->string('destination_long')->nullable();
            $table->string('destination_address')->nullable();
            $table->integer('pay_type')->nullable();
            $table->string('code')->nullable();
            $table->double('rate')->nullable();
            $table->integer('driver')->nullable();
            $table->string('cancel_status')->nullable();
            $table->integer('user')->nullable();
            $table->double('price')->nullable();
            $table->string('pay_side')->nullable();
            $table->integer('delivery_id')->nullable();
            $table->string('name')->nullable();
            $table->string('mobile')->nullable();
            $table->string('canceled_by')->nullable();
            $table->double('driver_rate')->nullable();
            $table->tinyInteger('user_rate')->nullable();
            $table->string('hurry_percent')->nullable();
            $table->integer('cancel_reason')->nullable();
            $table->double('net_price')->nullable();
            $table->double('percent_discount')->nullable()->default(0);
            $table->string('percent_code')->nullable();
            $table->double('discounted_price')->nullable();
            $table->tinyInteger('economic')->nullable();
            $table->integer('state')->nullable();
            $table->double('stop_minutes')->nullable();
            $table->tinyInteger('comeback')->nullable();
            $table->tinyInteger('hurry')->nullable();
            $table->integer('agency')->nullable();
            $table->tinyInteger('reserve')->nullable();
            $table->tinyInteger('private')->nullable();
            $table->tinyInteger('helper')->nullable();
            $table->tinyInteger('cooler')->nullable();
            $table->date('date_reserve')->nullable();
            $table->string('time_reserve')->nullable();
            $table->string('stop_time2')->nullable();
            $table->double('stop_minutes2')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ar_orders');
    }
};

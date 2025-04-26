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
        Schema::create('visits', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('ip', 45)->nullable();
            $table->integer('route_id')->nullable();
            $table->integer('record_id')->nullable();
            $table->integer('user_id')->nullable();
            $table->string('platform', 45)->nullable();
            $table->string('os', 45)->nullable();
            $table->string('browser', 45)->nullable();
            $table->date('date')->nullable();
            $table->integer('count')->default(1);
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
        Schema::dropIfExists('visits');
    }
};

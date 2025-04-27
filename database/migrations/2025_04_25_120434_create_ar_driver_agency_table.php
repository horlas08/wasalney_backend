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
        Schema::create('ar_driver_agency', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('parent_slug')->nullable();
            $table->integer('parent_id')->nullable();
            $table->bigInteger('sort');
            $table->integer('report_id');
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrentOnUpdate()->useCurrent();
            $table->string('mobile')->nullable();
            $table->string('verify_code')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ar_driver_agency');
    }
};

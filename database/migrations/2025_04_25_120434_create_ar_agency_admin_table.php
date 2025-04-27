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
        Schema::create('ar_agency_admin', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('parent_slug')->nullable();
            $table->integer('parent_id')->nullable();
            $table->bigInteger('sort')->nullable();
            $table->integer('report_id')->nullable();
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrentOnUpdate()->useCurrent();
            $table->string('username')->nullable();
            $table->string('password')->nullable();
            $table->string('name')->nullable();
            $table->string('email')->nullable();
            $table->double('level')->nullable();
            $table->string('notif_token')->nullable();
            $table->double('number')->nullable();
            $table->double('commission')->nullable();
            $table->string('address')->nullable();
            $table->string('title')->nullable();
            $table->string('image')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ar_agency_admin');
    }
};

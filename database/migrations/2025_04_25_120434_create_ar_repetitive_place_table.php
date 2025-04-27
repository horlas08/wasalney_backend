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
        Schema::create('ar_repetitive_place', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('parent_slug')->nullable();
            $table->integer('parent_id')->nullable();
            $table->bigInteger('sort');
            $table->integer('report_id');
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrentOnUpdate()->useCurrent();
            $table->integer('origin')->nullable();
            $table->integer('destination')->nullable();
            $table->integer('delivery')->nullable();
            $table->string('title_origin')->nullable();
            $table->string('lat_origin')->nullable();
            $table->string('long_origin')->nullable();
            $table->string('lat_destination')->nullable();
            $table->string('long_destination')->nullable();
            $table->string('title_destination')->nullable();
            $table->string('address_origin')->nullable();
            $table->string('address_destination')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ar_repetitive_place');
    }
};

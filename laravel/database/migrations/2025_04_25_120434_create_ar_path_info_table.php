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
        Schema::create('ar_path_info', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('parent_slug')->nullable();
            $table->integer('parent_id')->nullable();
            $table->bigInteger('sort');
            $table->integer('report_id');
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrentOnUpdate()->useCurrent();
            $table->string('name')->nullable();
            $table->string('lat')->nullable();
            $table->string('long')->nullable();
            $table->string('address')->nullable();
            $table->string('description')->nullable();
            $table->string('phone')->nullable();
            $table->string('house_number')->nullable();
            $table->string('unit')->nullable();
            $table->string('type')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ar_path_info');
    }
};

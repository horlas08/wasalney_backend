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
        Schema::create('admin_accesses', function (Blueprint $table) {
            $table->integer('id', true);
            $table->integer('admin_id');
            $table->string('name', 45);
            $table->string('category_slug', 45)->nullable();
            $table->tinyInteger('show')->default(1);
            $table->tinyInteger('store')->default(1);
            $table->tinyInteger('edit')->default(1);
            $table->tinyInteger('delete')->default(1);
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
        Schema::dropIfExists('admin_accesses');
    }
};

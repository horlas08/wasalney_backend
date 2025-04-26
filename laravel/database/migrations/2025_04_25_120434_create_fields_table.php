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
        Schema::create('fields', function (Blueprint $table) {
            $table->integer('id', true);
            $table->string('category_slug', 45);
            $table->string('title');
            $table->string('name');
            $table->string('type');
            $table->string('validation')->nullable();
            $table->boolean('is_unique')->default(false);
            $table->boolean('panel_show')->default(true);
            $table->tinyInteger('json_show')->default(1);
            $table->boolean('excel_show')->default(true);
            $table->boolean('excel_import')->default(false);
            $table->string('options_cat_slug', 45)->nullable();
            $table->string('options_str_sample')->nullable();
            $table->integer('sort');
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
        Schema::dropIfExists('fields');
    }
};

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
        Schema::create('routes', function (Blueprint $table) {
            $table->integer('id', true);
            $table->integer('field_id')->nullable();
            $table->integer('role_id')->nullable();
            $table->string('title');
            $table->string('address');
            $table->string('view');
            $table->string('changefreq', 10)->nullable();
            $table->float('priority', 10, 0)->nullable();
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
        Schema::dropIfExists('routes');
    }
};

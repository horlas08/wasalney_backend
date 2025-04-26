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
        Schema::create('user_roles', function (Blueprint $table) {
            $table->integer('id', true);
            $table->string('title', 45);
            $table->string('category_slug', 45);
            $table->integer('username_field_id');
            $table->integer('password_field_id')->nullable();
            $table->integer('login_route_id')->nullable();
            $table->integer('landing_route_id')->nullable();
            $table->integer('	logout_route_id')->nullable();
            $table->integer('logout_route_id')->nullable();
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
        Schema::dropIfExists('user_roles');
    }
};

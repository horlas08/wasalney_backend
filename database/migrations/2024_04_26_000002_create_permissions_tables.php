<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('permissions', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->string('title');
            $table->timestamps();
        });

        Schema::create('permission_actions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('permission_id')->constrained()->onDelete('cascade');
            $table->string('name');
            $table->string('title');
            $table->timestamps();

            $table->unique(['permission_id', 'name']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('permission_actions');
        Schema::dropIfExists('permissions');
    }
};

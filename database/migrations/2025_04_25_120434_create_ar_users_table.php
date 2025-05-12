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
        Schema::create('ar_users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('parent_slug')->nullable();
            $table->integer('parent_id')->nullable();
            $table->bigInteger('sort');
            $table->integer('report_id');
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrentOnUpdate()->useCurrent();
            $table->string('email')->nullable();
            $table->string('name')->nullable();
            $table->string('address')->nullable();
            $table->string('mobile')->nullable();
            $table->string('verify_code')->nullable();
            $table->text('image')->nullable();
            $table->date('birth_date')->nullable();
            $table->string('notif_token')->nullable();
            $table->string('code')->nullable();
            $table->string('intro_code')->nullable();
            $table->double('credit')->nullable();
            $table->string('fcm_token')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ar_users');
    }
};

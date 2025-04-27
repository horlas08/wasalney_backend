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
        Schema::create('ar_drivers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('parent_slug')->nullable();
            $table->integer('parent_id')->nullable();
            $table->bigInteger('sort');
            $table->integer('report_id');
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrentOnUpdate()->useCurrent();
            $table->string('name')->nullable();
            $table->string('mobile')->nullable();
            $table->string('code_meli')->nullable();
            $table->string('verify_code')->nullable();
            $table->string('lat')->nullable();
            $table->string('long')->nullable();
            $table->string('number_licence')->nullable();
            $table->integer('certificate_type')->nullable();
            $table->integer('type_activity')->nullable();
            $table->tinyInteger('state')->nullable();
            $table->string('image')->nullable();
            $table->date('certificat_date')->nullable();
            $table->string('certificate_validity')->nullable();
            $table->integer('level')->nullable();
            $table->double('credit')->nullable();
            $table->string('notif_token')->nullable();
            $table->string('car_tag')->nullable();
            $table->string('code')->nullable();
            $table->string('intro_code')->nullable();
            $table->tinyInteger('has_documents')->nullable();
            $table->tinyInteger('has_car_details')->nullable();
            $table->tinyInteger('has_info_bank')->nullable();
            $table->tinyInteger('has_info_user')->nullable();
            $table->tinyInteger('has_profile')->nullable();
            $table->string('description')->nullable();
            $table->integer('state_approval')->nullable();
            $table->string('family_number')->nullable();
            $table->integer('agency')->nullable();
            $table->string('verify_agency')->nullable();
            $table->string('car_model')->nullable();
            $table->integer('car_detail')->nullable();
            $table->integer('gender')->nullable();
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
        Schema::dropIfExists('ar_drivers');
    }
};

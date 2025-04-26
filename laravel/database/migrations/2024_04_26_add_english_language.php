<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Language;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Check if English already exists
        if (!Language::where('abbr', 'en')->exists()) {
            Language::create([
                'title' => 'English',
                'abbr' => 'en',
                'direction' => 'ltr',
                'is_default' => false
            ]);
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Language::where('abbr', 'en')->delete();
    }
};
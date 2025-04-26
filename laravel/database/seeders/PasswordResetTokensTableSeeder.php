<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class PasswordResetTokensTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('password_reset_tokens')->delete();
        
        
        
    }
}
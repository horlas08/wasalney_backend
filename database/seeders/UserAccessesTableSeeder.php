<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class UserAccessesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('user_accesses')->delete();
        
        
        
    }
}
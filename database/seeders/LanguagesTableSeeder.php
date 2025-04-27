<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class LanguagesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('languages')->delete();
        
        \DB::table('languages')->insert(array (
            0 => 
            array (
                'abbr' => 'ar',
                'created_at' => '2024-08-31 08:00:21',
                'direction' => 'rtl',
                'id' => 2,
                'is_default' => 1,
                'title' => 'عربی',
                'updated_at' => '2024-09-01 13:29:16',
            ),
        ));
        
        
    }
}
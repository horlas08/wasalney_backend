<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ArLimitTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('ar_limit')->delete();
        
        \DB::table('ar_limit')->insert(array (
            0 => 
            array (
                'created_at' => '2024-06-05 09:17:16',
                'id' => 2,
                'meter' => 40000000000.0,
                'parent_id' => NULL,
                'parent_slug' => NULL,
                'report_id' => 196306,
                'sort' => 1717575436961400000,
                'updated_at' => '2025-02-03 10:55:46',
            ),
        ));
        
        
    }
}
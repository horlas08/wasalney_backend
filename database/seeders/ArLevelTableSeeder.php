<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ArLevelTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('ar_level')->delete();
        
        \DB::table('ar_level')->insert(array (
            0 => 
            array (
                'created_at' => '2024-01-21 07:45:39',
                'id' => 1,
                'parent_id' => NULL,
                'parent_slug' => NULL,
                'report_id' => 52783,
                'sort' => 1705819539463300000,
                'title' => 'ذهبي',
                'updated_at' => '2024-10-26 08:48:38',
            ),
            1 => 
            array (
                'created_at' => '2024-01-21 07:45:45',
                'id' => 2,
                'parent_id' => NULL,
                'parent_slug' => NULL,
                'report_id' => 52782,
                'sort' => 1705819545296700000,
                'title' => 'فضي',
                'updated_at' => '2024-10-26 08:48:23',
            ),
            2 => 
            array (
                'created_at' => '2024-01-21 07:54:11',
                'id' => 3,
                'parent_id' => NULL,
                'parent_slug' => NULL,
                'report_id' => 2162,
                'sort' => 1705820051532500000,
                'title' => 'عادی',
                'updated_at' => '2024-03-09 09:22:54',
            ),
        ));
        
        
    }
}
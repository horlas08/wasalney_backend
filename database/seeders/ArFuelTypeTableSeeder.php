<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ArFuelTypeTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('ar_fuel_type')->delete();
        
        \DB::table('ar_fuel_type')->insert(array (
            0 => 
            array (
                'created_at' => '2024-01-09 03:28:04',
                'id' => 1,
                'parent_id' => NULL,
                'parent_slug' => NULL,
                'report_id' => 43867,
                'sort' => 1704779884775200000,
            'title' => 'الغاز الطبيعي المضغوط (CNG)',
                'updated_at' => '2024-09-16 09:44:04',
            ),
            1 => 
            array (
                'created_at' => '2024-05-21 11:53:02',
                'id' => 2,
                'parent_id' => NULL,
                'parent_slug' => NULL,
                'report_id' => 43866,
                'sort' => 1716288782419000000,
            'title' => 'الديزل (Diesel)',
                'updated_at' => '2024-09-16 09:43:42',
            ),
            2 => 
            array (
                'created_at' => '2024-05-21 11:53:15',
                'id' => 3,
                'parent_id' => NULL,
                'parent_slug' => NULL,
                'report_id' => 43865,
                'sort' => 1716288795531300000,
                'title' => 'البنزين',
                'updated_at' => '2024-09-16 09:43:12',
            ),
            3 => 
            array (
                'created_at' => '2024-09-16 09:44:33',
                'id' => 4,
                'parent_id' => NULL,
                'parent_slug' => NULL,
                'report_id' => 0,
                'sort' => 1726476273207700000,
            'title' => 'غاز البترول المسال (LPG)',
                'updated_at' => '2024-09-16 09:44:33',
            ),
        ));
        
        
    }
}
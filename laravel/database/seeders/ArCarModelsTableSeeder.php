<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ArCarModelsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('ar_car_models')->delete();
        
        \DB::table('ar_car_models')->insert(array (
            0 => 
            array (
                'created_at' => '2024-05-21 11:53:59',
                'id' => 3,
                'parent_id' => NULL,
                'parent_slug' => NULL,
                'report_id' => 44006,
                'sort' => 1716288839577500000,
                'title' => 'ايسوزو',
                'updated_at' => '2024-09-16 09:52:30',
            ),
            1 => 
            array (
                'created_at' => '2024-05-21 11:54:06',
                'id' => 4,
                'parent_id' => NULL,
                'parent_slug' => NULL,
                'report_id' => 44005,
                'sort' => 1716288846877900000,
                'title' => 'كيا',
                'updated_at' => '2024-09-16 09:52:02',
            ),
            2 => 
            array (
                'created_at' => '2024-05-21 11:54:14',
                'id' => 5,
                'parent_id' => NULL,
                'parent_slug' => NULL,
                'report_id' => 44004,
                'sort' => 1716288854651600000,
                'title' => 'هينو',
                'updated_at' => '2024-09-16 09:51:49',
            ),
            3 => 
            array (
                'created_at' => '2024-09-16 09:52:50',
                'id' => 72,
                'parent_id' => NULL,
                'parent_slug' => NULL,
                'report_id' => 0,
                'sort' => 1726476770795300000,
                'title' => 'سكانيا',
                'updated_at' => '2024-09-16 09:52:50',
            ),
            4 => 
            array (
                'created_at' => '2024-09-16 09:53:10',
                'id' => 73,
                'parent_id' => NULL,
                'parent_slug' => NULL,
                'report_id' => 0,
                'sort' => 1726476790697100000,
                'title' => 'فولفو',
                'updated_at' => '2024-09-16 09:53:10',
            ),
            5 => 
            array (
                'created_at' => '2024-09-16 09:53:43',
                'id' => 74,
                'parent_id' => NULL,
                'parent_slug' => NULL,
                'report_id' => 0,
                'sort' => 1726476823803100000,
                'title' => 'مرسيدس',
                'updated_at' => '2024-09-16 09:53:43',
            ),
            6 => 
            array (
                'created_at' => '2024-09-16 09:54:31',
                'id' => 75,
                'parent_id' => NULL,
                'parent_slug' => NULL,
                'report_id' => 0,
                'sort' => 1726476871513000000,
                'title' => 'ميتسوبيشي',
                'updated_at' => '2024-09-16 09:54:31',
            ),
            7 => 
            array (
                'created_at' => '2024-09-16 09:55:26',
                'id' => 76,
                'parent_id' => NULL,
                'parent_slug' => NULL,
                'report_id' => 0,
                'sort' => 1726476926635500000,
                'title' => 'مازدا',
                'updated_at' => '2024-09-16 09:55:26',
            ),
        ));
        
        
    }
}
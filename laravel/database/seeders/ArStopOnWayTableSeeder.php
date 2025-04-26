<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ArStopOnWayTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('ar_stop_on_way')->delete();
        
        \DB::table('ar_stop_on_way')->insert(array (
            0 => 
            array (
                'created_at' => '2024-02-04 08:12:29',
                'id' => 7,
                'minutes' => 0.0,
                'parent_id' => 9,
                'parent_slug' => 'deliveries',
                'price' => 0.0,
                'report_id' => 0,
                'sort' => 1707030749375700000,
                'time' => 'لا يوجد',
                'updated_at' => '2024-10-24 07:58:35',
            ),
            1 => 
            array (
                'created_at' => '2024-03-17 03:49:27',
                'id' => 10,
                'minutes' => 15.0,
                'parent_id' => 11,
                'parent_slug' => 'deliveries',
                'price' => 10000.0,
                'report_id' => 0,
                'sort' => 1710656367353700000,
                'time' => 'الى 15 دقیقه',
                'updated_at' => '2024-09-16 09:06:05',
            ),
            2 => 
            array (
                'created_at' => '2024-03-17 03:49:31',
                'id' => 11,
                'minutes' => 0.0,
                'parent_id' => 11,
                'parent_slug' => 'deliveries',
                'price' => 0.0,
                'report_id' => 0,
                'sort' => 1710656371790700000,
                'time' => 'لا يوجد',
                'updated_at' => '2024-09-16 09:05:35',
            ),
            3 => 
            array (
                'created_at' => '2024-04-21 12:35:51',
                'id' => 12,
                'minutes' => 0.0,
                'parent_id' => 10,
                'parent_slug' => 'deliveries',
                'price' => 0.0,
                'report_id' => 0,
                'sort' => 1713699351421500000,
                'time' => 'لا يوجد',
                'updated_at' => '2024-09-16 09:16:48',
            ),
        ));
        
        
    }
}
<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ArMessageTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('ar_message')->delete();
        
        \DB::table('ar_message')->insert(array (
            0 => 
            array (
                'created_at' => '2025-03-15 08:52:09',
                'driver' => 1,
                'driver_sent' => 0,
                'id' => 1,
                'messsage' => 'slm',
                'parent_id' => 1,
                'parent_slug' => 'orders',
                'report_id' => 200165,
                'sort' => 1742026929911300000,
                'updated_at' => '2025-03-15 08:52:09',
                'user' => 1,
                'user_sent' => 1,
            ),
            1 => 
            array (
                'created_at' => '2025-03-15 08:52:18',
                'driver' => 1,
                'driver_sent' => 1,
                'id' => 2,
                'messsage' => 'jjhg',
                'parent_id' => 1,
                'parent_slug' => 'orders',
                'report_id' => 200166,
                'sort' => 1742026938240900000,
                'updated_at' => '2025-03-15 08:52:18',
                'user' => 1,
                'user_sent' => 0,
            ),
            2 => 
            array (
                'created_at' => '2025-03-15 08:52:23',
                'driver' => 1,
                'driver_sent' => 0,
                'id' => 3,
                'messsage' => 'iiujh',
                'parent_id' => 1,
                'parent_slug' => 'orders',
                'report_id' => 200168,
                'sort' => 1742026943935100000,
                'updated_at' => '2025-03-15 08:52:23',
                'user' => 1,
                'user_sent' => 1,
            ),
            3 => 
            array (
                'created_at' => '2025-03-17 11:26:47',
                'driver' => 1,
                'driver_sent' => 1,
                'id' => 4,
                'messsage' => 'hi',
                'parent_id' => 4,
                'parent_slug' => 'orders',
                'report_id' => 200436,
                'sort' => 1742209007955400000,
                'updated_at' => '2025-03-17 11:26:47',
                'user' => 2,
                'user_sent' => 0,
            ),
            4 => 
            array (
                'created_at' => '2025-03-17 11:29:36',
                'driver' => 1,
                'driver_sent' => 1,
                'id' => 5,
                'messsage' => 'hi',
                'parent_id' => 15,
                'parent_slug' => 'orders',
                'report_id' => 200492,
                'sort' => 1742209176889300000,
                'updated_at' => '2025-03-17 11:29:36',
                'user' => 3,
                'user_sent' => 0,
            ),
            5 => 
            array (
                'created_at' => '2025-03-17 11:31:53',
                'driver' => 1,
                'driver_sent' => 0,
                'id' => 6,
                'messsage' => 'hi',
                'parent_id' => 16,
                'parent_slug' => 'orders',
                'report_id' => 200525,
                'sort' => 1742209313425900000,
                'updated_at' => '2025-03-17 11:31:53',
                'user' => 3,
                'user_sent' => 1,
            ),
            6 => 
            array (
                'created_at' => '2025-03-17 11:32:08',
                'driver' => 1,
                'driver_sent' => 1,
                'id' => 7,
                'messsage' => 'hj',
                'parent_id' => 16,
                'parent_slug' => 'orders',
                'report_id' => 200527,
                'sort' => 1742209328462200000,
                'updated_at' => '2025-03-17 11:32:08',
                'user' => 3,
                'user_sent' => 0,
            ),
        ));
        
        
    }
}
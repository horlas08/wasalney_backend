<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ArDriversSendTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('ar_drivers_send')->delete();
        
        \DB::table('ar_drivers_send')->insert(array (
            0 => 
            array (
                'created_at' => '2025-03-15 08:51:45',
                'driver' => 1,
                'id' => 1,
                'parent_id' => 1,
                'parent_slug' => 'orders',
                'report_id' => 200159,
                'sort' => 1742026905401300000,
                'updated_at' => '2025-03-15 08:51:45',
            ),
            1 => 
            array (
                'created_at' => '2025-03-15 11:21:52',
                'driver' => 1,
                'id' => 3,
                'parent_id' => 4,
                'parent_slug' => 'orders',
                'report_id' => 200236,
                'sort' => 1742035912814200000,
                'updated_at' => '2025-03-15 11:21:52',
            ),
            2 => 
            array (
                'created_at' => '2025-03-17 11:28:42',
                'driver' => 1,
                'id' => 5,
                'parent_id' => 15,
                'parent_slug' => 'orders',
                'report_id' => 200475,
                'sort' => 1742209122131200000,
                'updated_at' => '2025-03-17 11:28:42',
            ),
            3 => 
            array (
                'created_at' => '2025-03-17 11:29:49',
                'driver' => 1,
                'id' => 6,
                'parent_id' => 16,
                'parent_slug' => 'orders',
                'report_id' => 200499,
                'sort' => 1742209189540600000,
                'updated_at' => '2025-03-17 11:29:49',
            ),
            4 => 
            array (
                'created_at' => '2025-03-17 13:58:39',
                'driver' => 1,
                'id' => 7,
                'parent_id' => 18,
                'parent_slug' => 'orders',
                'report_id' => 200554,
                'sort' => 1742218119588100000,
                'updated_at' => '2025-03-17 13:58:39',
            ),
        ));
        
        
    }
}
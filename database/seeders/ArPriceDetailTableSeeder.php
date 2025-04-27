<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ArPriceDetailTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('ar_price_detail')->delete();
        
        \DB::table('ar_price_detail')->insert(array (
            0 => 
            array (
                'back_price' => 0.0,
                'base_price' => 5000.0,
                'created_at' => '2025-03-15 08:51:45',
                'decrease_percent' => 5000.0,
                'final_price' => 31000.0,
                'hurry_percent' => 0.0,
                'id' => 1,
                'multiply_price' => 2000.0,
                'parent_id' => 1,
                'parent_slug' => 'orders',
                'report_id' => 200158,
                'sort' => 1742026905313600000,
                'updated_at' => '2025-03-15 08:51:45',
            ),
            1 => 
            array (
                'back_price' => 0.0,
                'base_price' => 5000.0,
                'created_at' => '2025-03-15 11:21:52',
                'decrease_percent' => 5000.0,
                'final_price' => 13000.0,
                'hurry_percent' => 0.0,
                'id' => 4,
                'multiply_price' => 2000.0,
                'parent_id' => 4,
                'parent_slug' => 'orders',
                'report_id' => 200235,
                'sort' => 1742035912750000000,
                'updated_at' => '2025-03-15 11:21:52',
            ),
            2 => 
            array (
                'back_price' => 0.0,
                'base_price' => 5000.0,
                'created_at' => '2025-03-17 11:28:34',
                'decrease_percent' => 5000.0,
                'final_price' => 5000.0,
                'hurry_percent' => 0.0,
                'id' => 15,
                'multiply_price' => 2000.0,
                'parent_id' => 15,
                'parent_slug' => 'orders',
                'report_id' => 200473,
                'sort' => 1742209114904400000,
                'updated_at' => '2025-03-17 11:28:34',
            ),
            3 => 
            array (
                'back_price' => 0.0,
                'base_price' => 5000.0,
                'created_at' => '2025-03-17 11:29:49',
                'decrease_percent' => 5000.0,
                'final_price' => 5000.0,
                'hurry_percent' => 0.0,
                'id' => 16,
                'multiply_price' => 2000.0,
                'parent_id' => 16,
                'parent_slug' => 'orders',
                'report_id' => 200498,
                'sort' => 1742209189457600000,
                'updated_at' => '2025-03-17 11:29:49',
            ),
            4 => 
            array (
                'back_price' => 0.0,
                'base_price' => 5000.0,
                'created_at' => '2025-03-17 13:58:39',
                'decrease_percent' => 5000.0,
                'final_price' => 188000.0,
                'hurry_percent' => 0.0,
                'id' => 18,
                'multiply_price' => 2000.0,
                'parent_id' => 18,
                'parent_slug' => 'orders',
                'report_id' => 200553,
                'sort' => 1742218119536400000,
                'updated_at' => '2025-03-17 13:58:39',
            ),
        ));
        
        
    }
}
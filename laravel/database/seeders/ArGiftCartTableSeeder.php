<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ArGiftCartTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('ar_gift_cart')->delete();
        
        \DB::table('ar_gift_cart')->insert(array (
            0 => 
            array (
                'count' => NULL,
                'created_at' => '2024-02-21 07:13:00',
                'expire_date' => '2024-02-25',
                'gift_code' => 't30',
                'id' => 1,
                'min_price' => NULL,
                'parent_id' => NULL,
                'parent_slug' => NULL,
                'percent' => 20.0,
                'report_id' => 0,
                'sort' => 1708495980908900000,
                'updated_at' => '2024-03-09 09:22:55',
            ),
            1 => 
            array (
                'count' => NULL,
                'created_at' => '2024-02-24 11:19:20',
                'expire_date' => '2024-04-18',
                'gift_code' => 't20',
                'id' => 2,
                'min_price' => NULL,
                'parent_id' => NULL,
                'parent_slug' => NULL,
                'percent' => 10.0,
                'report_id' => 0,
                'sort' => 1708769960481700000,
                'updated_at' => '2024-04-06 02:29:16',
            ),
            2 => 
            array (
                'count' => NULL,
                'created_at' => '2024-07-23 09:09:03',
                'expire_date' => '2024-08-20',
                'gift_code' => 'test20',
                'id' => 3,
                'min_price' => NULL,
                'parent_id' => NULL,
                'parent_slug' => NULL,
                'percent' => 20.0,
                'report_id' => 33318,
                'sort' => 1721722143064800000,
                'updated_at' => '2024-07-23 09:09:03',
            ),
            3 => 
            array (
                'count' => 20.0,
                'created_at' => '2024-09-16 07:54:48',
                'expire_date' => '2024-10-31',
                'gift_code' => 'ttthh',
                'id' => 4,
                'min_price' => 2000.0,
                'parent_id' => NULL,
                'parent_slug' => NULL,
                'percent' => 20.0,
                'report_id' => 0,
                'sort' => 1726469688671400000,
                'updated_at' => '2024-10-27 05:31:29',
            ),
        ));
        
        
    }
}
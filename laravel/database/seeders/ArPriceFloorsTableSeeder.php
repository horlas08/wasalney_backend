<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ArPriceFloorsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('ar_price_floors')->delete();
        
        \DB::table('ar_price_floors')->insert(array (
            0 => 
            array (
                'created_at' => '2024-02-05 05:58:53',
                'elevator_price' => 2.0,
                'floor_price' => 3000.0,
                'id' => 1,
                'name' => 'عدد الطوابق',
                'parent_id' => 9,
                'parent_slug' => 'deliveries',
                'report_id' => 0,
                'sort' => 1707109133248500000,
                'updated_at' => '2024-09-16 09:34:34',
            ),
            1 => 
            array (
                'created_at' => '2024-02-21 19:04:10',
                'elevator_price' => 2.0,
                'floor_price' => 5000.0,
                'id' => 2,
                'name' => 'عدد الطوابق',
                'parent_id' => 10,
                'parent_slug' => 'deliveries',
                'report_id' => 0,
                'sort' => 1708538650858400000,
                'updated_at' => '2024-09-16 09:19:28',
            ),
            2 => 
            array (
                'created_at' => '2024-03-17 03:59:25',
                'elevator_price' => 3.0,
                'floor_price' => 2000.0,
                'id' => 3,
                'name' => 'عدد الطوابق',
                'parent_id' => 11,
                'parent_slug' => 'deliveries',
                'report_id' => 0,
                'sort' => 1710656965227100000,
                'updated_at' => '2024-09-16 09:04:04',
            ),
        ));
        
        
    }
}
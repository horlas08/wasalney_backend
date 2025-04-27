<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ArMinimumPriceDriverTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('ar_minimum_price_driver')->delete();
        
        \DB::table('ar_minimum_price_driver')->insert(array (
            0 => 
            array (
                'created_at' => '2024-10-14 11:09:28',
                'id' => 1,
                'parent_id' => NULL,
                'parent_slug' => NULL,
                'price' => 3000.0,
                'report_id' => 55100,
                'sort' => 1728902368890700000,
                'updated_at' => '2024-10-27 16:09:29',
            ),
        ));
        
        
    }
}
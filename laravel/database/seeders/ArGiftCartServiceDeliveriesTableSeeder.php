<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ArGiftCartServiceDeliveriesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('ar_gift_cart_service_deliveries')->delete();
        
        \DB::table('ar_gift_cart_service_deliveries')->insert(array (
            0 => 
            array (
                'created_at' => '2024-07-23 09:09:03',
                'deliveries_id' => 10,
                'gift_cart_id' => 3,
                'id' => 9,
                'updated_at' => '2024-07-23 09:09:03',
            ),
            1 => 
            array (
                'created_at' => '2024-10-27 06:01:29',
                'deliveries_id' => 11,
                'gift_cart_id' => 4,
                'id' => 17,
                'updated_at' => '2024-10-27 06:01:29',
            ),
            2 => 
            array (
                'created_at' => '2024-10-27 06:01:29',
                'deliveries_id' => 10,
                'gift_cart_id' => 4,
                'id' => 18,
                'updated_at' => '2024-10-27 06:01:29',
            ),
            3 => 
            array (
                'created_at' => '2024-10-27 06:01:29',
                'deliveries_id' => 9,
                'gift_cart_id' => 4,
                'id' => 19,
                'updated_at' => '2024-10-27 06:01:29',
            ),
        ));
        
        
    }
}
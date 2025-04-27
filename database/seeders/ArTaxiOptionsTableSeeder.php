<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ArTaxiOptionsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('ar_taxi_options')->delete();
        
        \DB::table('ar_taxi_options')->insert(array (
            0 => 
            array (
                'cooler' => 2.0,
                'created_at' => '2025-03-11 06:57:43',
                'helper' => 1000.0,
                'id' => 1,
                'parent_id' => 13,
                'parent_slug' => 'deliveries',
                'report_id' => 0,
                'sort' => 1741674463109700000,
                'updated_at' => '2025-03-11 06:58:38',
            ),
            1 => 
            array (
                'cooler' => 0.0,
                'created_at' => '2025-03-15 23:31:30',
                'helper' => 1000.0,
                'id' => 2,
                'parent_id' => 14,
                'parent_slug' => 'deliveries',
                'report_id' => 200238,
                'sort' => 1742079690909400000,
                'updated_at' => '2025-03-15 23:31:30',
            ),
        ));
        
        
    }
}
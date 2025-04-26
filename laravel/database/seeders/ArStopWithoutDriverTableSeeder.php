<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ArStopWithoutDriverTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('ar_stop_without_driver')->delete();
        
        \DB::table('ar_stop_without_driver')->insert(array (
            0 => 
            array (
                'created_at' => '2025-03-15 10:40:52',
                'id' => 1,
                'minutes' => 120.0,
                'parent_id' => 13,
                'parent_slug' => 'deliveries',
                'price' => 1000.0,
                'report_id' => 0,
                'sort' => 1742033452506700000,
                'time' => '2 ساعت',
                'updated_at' => '2025-03-15 10:40:52',
            ),
        ));
        
        
    }
}
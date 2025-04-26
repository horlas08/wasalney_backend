<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ArConditionRateTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('ar_condition_rate')->delete();
        
        \DB::table('ar_condition_rate')->insert(array (
            0 => 
            array (
                'created_at' => '2024-06-22 11:17:04',
                'id' => 1,
                'parent_id' => NULL,
                'parent_slug' => NULL,
                'price' => 100000.0,
                'report_id' => 0,
                'sort' => 1719051424252300000,
                'updated_at' => '2024-08-10 05:37:41',
            ),
        ));
        
        
    }
}
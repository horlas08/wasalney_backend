<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ArWayTypeTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('ar_way_type')->delete();
        
        \DB::table('ar_way_type')->insert(array (
            0 => 
            array (
                'created_at' => '2023-12-28 02:47:47',
                'id' => 1,
                'parent_id' => NULL,
                'parent_slug' => NULL,
                'report_id' => 81,
                'sort' => 1703740667696100000,
                'title' => 'مبدا',
                'updated_at' => '2024-03-09 09:22:54',
            ),
            1 => 
            array (
                'created_at' => '2023-12-28 02:47:53',
                'id' => 2,
                'parent_id' => NULL,
                'parent_slug' => NULL,
                'report_id' => 82,
                'sort' => 1703740673939500000,
                'title' => 'مقصد',
                'updated_at' => '2024-03-09 09:22:54',
            ),
        ));
        
        
    }
}
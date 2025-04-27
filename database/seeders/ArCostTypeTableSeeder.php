<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ArCostTypeTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('ar_cost_type')->delete();
        
        \DB::table('ar_cost_type')->insert(array (
            0 => 
            array (
                'created_at' => '2023-12-23 13:19:43',
                'id' => 1,
                'parent_id' => NULL,
                'parent_slug' => NULL,
                'report_id' => 13,
                'sort' => 1703346583069400000,
                'title' => 'برداشت',
                'type' => 0.0,
                'updated_at' => '2024-03-09 09:22:52',
            ),
            1 => 
            array (
                'created_at' => '2023-12-23 13:19:51',
                'id' => 2,
                'parent_id' => NULL,
                'parent_slug' => NULL,
                'report_id' => 14,
                'sort' => 1703346591637600000,
                'title' => 'افزودن',
                'type' => 1.0,
                'updated_at' => '2024-03-09 09:22:52',
            ),
        ));
        
        
    }
}
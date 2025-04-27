<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ArCancelTripTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('ar_cancel_trip')->delete();
        
        \DB::table('ar_cancel_trip')->insert(array (
            0 => 
            array (
                'created_at' => '2024-05-21 08:35:24',
                'id' => 1,
                'parent_id' => NULL,
                'parent_slug' => NULL,
                'report_id' => 46213,
                'sort' => 1716276924145300000,
                'title' => 'انا مستعجل و السائق بعيد',
                'updated_at' => '2024-09-24 15:23:13',
            ),
            1 => 
            array (
                'created_at' => '2024-07-23 08:20:28',
                'id' => 2,
                'parent_id' => NULL,
                'parent_slug' => NULL,
                'report_id' => 46189,
                'sort' => 1721719228900600000,
                'title' => 'غیرت رأيي',
                'updated_at' => '2024-09-24 15:18:01',
            ),
        ));
        
        
    }
}
<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ArServicePlaceRepitiveTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('ar_service_place_repitive')->delete();
        
        \DB::table('ar_service_place_repitive')->insert(array (
            0 => 
            array (
                'created_at' => '2024-12-04 11:21:27',
                'id' => 1,
                'parent_id' => NULL,
                'parent_slug' => NULL,
                'report_id' => 0,
                'service' => 11,
                'sort' => 1733309487098600000,
                'updated_at' => '2024-12-04 11:21:27',
            ),
        ));
        
        
    }
}
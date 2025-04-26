<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ArSupportTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('ar_support')->delete();
        
        \DB::table('ar_support')->insert(array (
            0 => 
            array (
                'created_at' => '2024-05-13 06:52:32',
                'id' => 1,
                'parent_id' => NULL,
                'parent_slug' => NULL,
                'phone' => '077296333336',
                'report_id' => 46168,
                'sort' => 1715579552409100000,
                'updated_at' => '2024-09-24 15:12:43',
            ),
        ));
        
        
    }
}
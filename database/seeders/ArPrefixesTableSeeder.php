<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ArPrefixesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('ar_prefixes')->delete();
        
        \DB::table('ar_prefixes')->insert(array (
            0 => 
            array (
                'created_at' => '2024-02-28 08:38:22',
                'id' => 1,
                'number' => '+98',
                'parent_id' => NULL,
                'parent_slug' => NULL,
                'report_id' => 0,
                'sort' => 1709105910055200001,
                'updated_at' => '2024-03-09 09:24:00',
            ),
            1 => 
            array (
                'created_at' => '2024-02-28 08:38:30',
                'id' => 2,
                'number' => '0098',
                'parent_id' => NULL,
                'parent_slug' => NULL,
                'report_id' => 26077,
                'sort' => 1709105910055200000,
                'updated_at' => '2024-05-21 11:49:28',
            ),
        ));
        
        
    }
}
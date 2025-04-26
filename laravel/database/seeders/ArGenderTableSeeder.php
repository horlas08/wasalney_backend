<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ArGenderTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('ar_gender')->delete();
        
        \DB::table('ar_gender')->insert(array (
            0 => 
            array (
                'created_at' => '2024-09-28 06:38:01',
                'id' => 1,
                'parent_id' => NULL,
                'parent_slug' => NULL,
                'report_id' => 0,
                'sort' => 1727503681044100000,
                'title' => 'انثى',
                'updated_at' => '2024-10-15 15:20:19',
            ),
            1 => 
            array (
                'created_at' => '2024-09-28 06:38:08',
                'id' => 2,
                'parent_id' => NULL,
                'parent_slug' => NULL,
                'report_id' => 0,
                'sort' => 1727503688400000000,
                'title' => 'ذكر',
                'updated_at' => '2024-10-15 15:20:05',
            ),
        ));
        
        
    }
}
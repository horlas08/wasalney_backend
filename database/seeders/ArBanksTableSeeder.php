<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ArBanksTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('ar_banks')->delete();
        
        \DB::table('ar_banks')->insert(array (
            0 => 
            array (
                'created_at' => '2024-01-29 07:10:56',
                'id' => 1,
                'parent_id' => NULL,
                'parent_slug' => NULL,
                'report_id' => 0,
                'sort' => 1706508656768400000,
                'title' => 'سامان',
                'updated_at' => '2024-03-09 09:22:54',
            ),
            1 => 
            array (
                'created_at' => '2024-01-29 07:11:01',
                'id' => 2,
                'parent_id' => NULL,
                'parent_slug' => NULL,
                'report_id' => 0,
                'sort' => 1706508661597300000,
                'title' => 'ملی',
                'updated_at' => '2024-03-09 09:22:54',
            ),
            2 => 
            array (
                'created_at' => '2024-01-29 07:11:07',
                'id' => 3,
                'parent_id' => NULL,
                'parent_slug' => NULL,
                'report_id' => 0,
                'sort' => 1706508667019300000,
                'title' => 'ملت',
                'updated_at' => '2024-03-09 09:22:54',
            ),
            3 => 
            array (
                'created_at' => '2024-01-29 07:11:18',
                'id' => 4,
                'parent_id' => NULL,
                'parent_slug' => NULL,
                'report_id' => 0,
                'sort' => 1706508678493100000,
                'title' => 'آینده',
                'updated_at' => '2024-03-09 09:22:54',
            ),
        ));
        
        
    }
}
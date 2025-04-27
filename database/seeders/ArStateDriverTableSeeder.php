<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ArStateDriverTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('ar_state_driver')->delete();
        
        \DB::table('ar_state_driver')->insert(array (
            0 => 
            array (
                'created_at' => '2024-02-22 09:39:48',
                'id' => 1,
                'parent_id' => NULL,
                'parent_slug' => NULL,
                'report_id' => 44008,
                'sort' => 1708591188334800000,
                'title' => 'مقبول',
                'updated_at' => '2024-09-16 09:57:46',
            ),
            1 => 
            array (
                'created_at' => '2024-02-22 09:39:54',
                'id' => 2,
                'parent_id' => NULL,
                'parent_slug' => NULL,
                'report_id' => 0,
                'sort' => 1708591194452700000,
                'title' => 'مرفوض',
                'updated_at' => '2024-09-16 09:57:34',
            ),
            2 => 
            array (
                'created_at' => '2024-02-22 09:42:48',
                'id' => 3,
                'parent_id' => NULL,
                'parent_slug' => NULL,
                'report_id' => 55099,
                'sort' => 1708591368102000001,
                'title' => 'معلق',
                'updated_at' => '2024-10-27 15:57:47',
            ),
        ));
        
        
    }
}
<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ArStateCompletedTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('ar_state_completed')->delete();
        
        \DB::table('ar_state_completed')->insert(array (
            0 => 
            array (
                'created_at' => '2024-05-11 06:50:47',
                'id' => 1,
                'parent_id' => NULL,
                'parent_slug' => NULL,
                'report_id' => 0,
                'sort' => 1715406647149500000,
                'title' => 'قيد المراجعة',
                'updated_at' => '2024-09-15 15:27:37',
            ),
            1 => 
            array (
                'created_at' => '2024-05-11 06:50:52',
                'id' => 2,
                'parent_id' => NULL,
                'parent_slug' => NULL,
                'report_id' => 0,
                'sort' => 1715406652518000000,
                'title' => 'مقبول',
                'updated_at' => '2024-09-15 15:27:15',
            ),
            2 => 
            array (
                'created_at' => '2024-05-11 06:50:57',
                'id' => 3,
                'parent_id' => NULL,
                'parent_slug' => NULL,
                'report_id' => 0,
                'sort' => 1715406657669100000,
                'title' => 'مرفوض',
                'updated_at' => '2024-09-15 15:26:54',
            ),
        ));
        
        
    }
}
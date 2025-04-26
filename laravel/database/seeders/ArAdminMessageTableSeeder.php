<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ArAdminMessageTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('ar_admin_message')->delete();
        
        \DB::table('ar_admin_message')->insert(array (
            0 => 
            array (
                'created_at' => '2024-10-09 11:49:08',
                'id' => 1,
                'message' => 'سلام',
                'parent_id' => NULL,
                'parent_slug' => NULL,
                'report_id' => 0,
                'sort' => 1728472748262200000,
                'updated_at' => '2024-10-09 11:49:08',
            ),
        ));
        
        
    }
}
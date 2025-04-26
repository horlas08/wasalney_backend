<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ArCertificatesTypesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('ar_certificates_types')->delete();
        
        \DB::table('ar_certificates_types')->insert(array (
            0 => 
            array (
                'created_at' => '2024-01-09 03:16:50',
                'id' => 1,
                'parent_id' => NULL,
                'parent_slug' => NULL,
                'report_id' => 43864,
                'sort' => 1704779210314800000,
                'title' => 'و',
                'updated_at' => '2024-09-16 09:40:37',
            ),
            1 => 
            array (
                'created_at' => '2024-05-21 11:44:40',
                'id' => 2,
                'parent_id' => NULL,
                'parent_slug' => NULL,
                'report_id' => 43863,
                'sort' => 1716288280418400000,
                'title' => 'ه',
                'updated_at' => '2024-09-16 09:40:28',
            ),
            2 => 
            array (
                'created_at' => '2024-05-21 11:46:01',
                'id' => 3,
                'parent_id' => NULL,
                'parent_slug' => NULL,
                'report_id' => 43862,
                'sort' => 1716288361663800000,
                'title' => 'د',
                'updated_at' => '2024-09-16 09:40:16',
            ),
            3 => 
            array (
                'created_at' => '2024-05-21 11:46:33',
                'id' => 4,
                'parent_id' => NULL,
                'parent_slug' => NULL,
                'report_id' => 43861,
                'sort' => 1716288393664400000,
                'title' => 'ج',
                'updated_at' => '2024-09-16 09:40:01',
            ),
            4 => 
            array (
                'created_at' => '2024-05-21 11:46:43',
                'id' => 5,
                'parent_id' => NULL,
                'parent_slug' => NULL,
                'report_id' => 43860,
                'sort' => 1716288403387800000,
                'title' => 'ب',
                'updated_at' => '2024-09-16 09:39:46',
            ),
            5 => 
            array (
                'created_at' => '2024-05-21 11:47:40',
                'id' => 6,
                'parent_id' => NULL,
                'parent_slug' => NULL,
                'report_id' => 43859,
                'sort' => 1716288460123600000,
                'title' => 'أ',
                'updated_at' => '2024-09-16 09:39:36',
            ),
        ));
        
        
    }
}
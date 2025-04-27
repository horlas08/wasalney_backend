<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ArServicesTypeTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('ar_services_type')->delete();
        
        \DB::table('ar_services_type')->insert(array (
            0 => 
            array (
                'created_at' => '2024-01-31 06:57:48',
                'id' => 1,
                'parent_id' => NULL,
                'parent_slug' => NULL,
                'report_id' => 200358,
                'sort' => 1706680668446700001,
                'title' => 'دراجه نارية',
                'updated_at' => '2025-03-17 07:40:29',
            ),
            1 => 
            array (
                'created_at' => '2024-01-31 06:58:42',
                'id' => 2,
                'parent_id' => NULL,
                'parent_slug' => NULL,
                'report_id' => 200359,
                'sort' => 1706680668446700000,
                'title' => 'توصل',
                'updated_at' => '2025-03-17 07:40:38',
            ),
            2 => 
            array (
                'created_at' => '2024-01-31 06:59:08',
                'id' => 3,
                'parent_id' => NULL,
                'parent_slug' => NULL,
                'report_id' => 45878,
                'sort' => 1706680748790000000,
                'title' => 'تكسي',
                'updated_at' => '2024-09-23 12:20:22',
            ),
            3 => 
            array (
                'created_at' => '2024-01-31 06:59:27',
                'id' => 4,
                'parent_id' => NULL,
                'parent_slug' => NULL,
                'report_id' => 200572,
                'sort' => 1706680767656400000,
                'title' => 'کرین',
                'updated_at' => '2025-03-17 20:26:42',
            ),
            4 => 
            array (
                'created_at' => '2024-01-31 06:59:34',
                'id' => 5,
                'parent_id' => NULL,
                'parent_slug' => NULL,
                'report_id' => 0,
                'sort' => 1706680774488000000,
                'title' => 'سیاره ثقيله',
                'updated_at' => '2025-03-17 07:40:47',
            ),
            5 => 
            array (
                'created_at' => '2024-01-31 06:59:39',
                'id' => 6,
                'parent_id' => NULL,
                'parent_slug' => NULL,
                'report_id' => 0,
                'sort' => 1706680779930000000,
                'title' => 'شاحنة كيا',
                'updated_at' => '2024-09-16 08:57:57',
            ),
        ));
        
        
    }
}
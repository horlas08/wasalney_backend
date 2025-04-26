<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ArGenerateCodeTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('ar_generate_code')->delete();
        
        \DB::table('ar_generate_code')->insert(array (
            0 => 
            array (
                'count' => 2.0,
                'created_at' => '2024-08-20 06:42:15',
                'id' => 5,
                'parent_id' => NULL,
                'parent_slug' => NULL,
                'price' => 200000.0,
                'report_id' => 0,
                'sort' => 1724132535071200000,
                'updated_at' => '2024-08-20 06:42:15',
            ),
            1 => 
            array (
                'count' => 50.0,
                'created_at' => '2024-09-07 08:35:04',
                'id' => 6,
                'parent_id' => NULL,
                'parent_slug' => NULL,
                'price' => 500.0,
                'report_id' => 0,
                'sort' => 1725694504683100000,
                'updated_at' => '2024-09-07 08:35:04',
            ),
            2 => 
            array (
                'count' => 100.0,
                'created_at' => '2024-09-15 15:14:41',
                'id' => 7,
                'parent_id' => NULL,
                'parent_slug' => NULL,
                'price' => 5000.0,
                'report_id' => 0,
                'sort' => 1726409681902700000,
                'updated_at' => '2024-09-15 15:14:41',
            ),
            3 => 
            array (
                'count' => 2.0,
                'created_at' => '2024-10-18 22:05:32',
                'id' => 8,
                'parent_id' => NULL,
                'parent_slug' => NULL,
                'price' => 5000.0,
                'report_id' => 0,
                'sort' => 1729287332756800000,
                'updated_at' => '2024-10-18 22:05:32',
            ),
            4 => 
            array (
                'count' => 50.0,
                'created_at' => '2024-10-28 07:53:58',
                'id' => 9,
                'parent_id' => NULL,
                'parent_slug' => NULL,
                'price' => 10000.0,
                'report_id' => 55360,
                'sort' => 1730100238010500000,
                'updated_at' => '2024-10-28 07:53:58',
            ),
            5 => 
            array (
                'count' => NULL,
                'created_at' => '2024-10-28 07:54:01',
                'id' => 10,
                'parent_id' => NULL,
                'parent_slug' => NULL,
                'price' => NULL,
                'report_id' => 55411,
                'sort' => 1730100241259300000,
                'updated_at' => '2024-10-28 07:54:01',
            ),
            6 => 
            array (
                'count' => 50.0,
                'created_at' => '2024-10-28 08:01:20',
                'id' => 11,
                'parent_id' => NULL,
                'parent_slug' => NULL,
                'price' => 10000.0,
                'report_id' => 55412,
                'sort' => 1730100680551300000,
                'updated_at' => '2024-10-28 08:01:20',
            ),
            7 => 
            array (
                'count' => 1.0,
                'created_at' => '2024-10-30 16:31:22',
                'id' => 12,
                'parent_id' => NULL,
                'parent_slug' => NULL,
                'price' => 10000.0,
                'report_id' => 57632,
                'sort' => 1730304082012900000,
                'updated_at' => '2024-10-30 16:31:22',
            ),
            8 => 
            array (
                'count' => 123456.0,
                'created_at' => '2024-12-09 20:04:14',
                'id' => 13,
                'parent_id' => NULL,
                'parent_slug' => NULL,
                'price' => 100000.0,
                'report_id' => 103477,
                'sort' => 1733772854148100000,
                'updated_at' => '2024-12-09 20:04:14',
            ),
        ));
        
        
    }
}
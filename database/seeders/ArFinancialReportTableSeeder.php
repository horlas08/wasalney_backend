<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ArFinancialReportTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('ar_financial_report')->delete();
        
        \DB::table('ar_financial_report')->insert(array (
            0 => 
            array (
                'created_at' => '2025-03-15 09:46:55',
                'id' => 1,
                'order' => 1,
                'parent_id' => NULL,
                'parent_slug' => NULL,
                'price' => 6200.0,
                'report_id' => 200185,
                'sort' => 1742030215414900000,
                'updated_at' => '2025-03-15 09:46:55',
            ),
            1 => 
            array (
                'created_at' => '2025-03-15 09:46:56',
                'id' => 2,
                'order' => 1,
                'parent_id' => NULL,
                'parent_slug' => NULL,
                'price' => 6200.0,
                'report_id' => 200189,
                'sort' => 1742030216501800000,
                'updated_at' => '2025-03-15 09:46:56',
            ),
            2 => 
            array (
                'created_at' => '2025-03-17 11:27:17',
                'id' => 3,
                'order' => 4,
                'parent_id' => NULL,
                'parent_slug' => NULL,
                'price' => 2600.0,
                'report_id' => 200443,
                'sort' => 1742209037432100000,
                'updated_at' => '2025-03-17 11:27:17',
            ),
            3 => 
            array (
                'created_at' => '2025-03-17 11:27:17',
                'id' => 4,
                'order' => 4,
                'parent_id' => NULL,
                'parent_slug' => NULL,
                'price' => 2600.0,
                'report_id' => 200447,
                'sort' => 1742209037615200000,
                'updated_at' => '2025-03-17 11:27:17',
            ),
            4 => 
            array (
                'created_at' => '2025-03-17 11:31:11',
                'id' => 5,
                'order' => 15,
                'parent_id' => NULL,
                'parent_slug' => NULL,
                'price' => 1000.0,
                'report_id' => 200508,
                'sort' => 1742209271401100000,
                'updated_at' => '2025-03-17 11:31:11',
            ),
            5 => 
            array (
                'created_at' => '2025-03-17 11:31:11',
                'id' => 6,
                'order' => 15,
                'parent_id' => NULL,
                'parent_slug' => NULL,
                'price' => 1000.0,
                'report_id' => 200512,
                'sort' => 1742209271673600000,
                'updated_at' => '2025-03-17 11:31:11',
            ),
        ));
        
        
    }
}
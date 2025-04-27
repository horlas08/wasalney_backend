<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ArPayTypsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('ar_pay_typs')->delete();
        
        \DB::table('ar_pay_typs')->insert(array (
            0 => 
            array (
                'created_at' => '2023-12-23 11:14:59',
                'id' => 1,
                'parent_id' => NULL,
                'parent_slug' => NULL,
                'report_id' => 43469,
                'sort' => 1703339099962100000,
                'title' => 'نقدي',
                'updated_at' => '2024-09-15 15:20:25',
            ),
            1 => 
            array (
                'created_at' => '2023-12-23 11:15:11',
                'id' => 2,
                'parent_id' => NULL,
                'parent_slug' => NULL,
                'report_id' => 43468,
                'sort' => 1703339111791200000,
                'title' => 'دفع الكتروني',
                'updated_at' => '2024-09-15 15:20:13',
            ),
            2 => 
            array (
                'created_at' => '2024-05-14 11:22:11',
                'id' => 3,
                'parent_id' => NULL,
                'parent_slug' => NULL,
                'report_id' => 0,
                'sort' => 1715682131971600000,
                'title' => 'المحفظة',
                'updated_at' => '2024-09-15 15:19:44',
            ),
            3 => 
            array (
                'created_at' => '2024-08-11 11:56:11',
                'id' => 4,
                'parent_id' => NULL,
                'parent_slug' => NULL,
                'report_id' => 0,
                'sort' => 1723373771656100000,
                'title' => 'النقاط',
                'updated_at' => '2024-09-15 15:19:24',
            ),
        ));
        
        
    }
}
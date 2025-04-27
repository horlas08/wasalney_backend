<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ArCommissionTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('ar_commission')->delete();
        
        \DB::table('ar_commission')->insert(array (
            0 => 
            array (
                'created_at' => '2024-03-17 03:54:54',
                'id' => 7,
                'level' => 3,
                'parent_id' => 11,
                'parent_slug' => 'deliveries',
                'percent' => '10',
                'report_id' => 65719,
                'sort' => 1710656694137800000,
                'updated_at' => '2024-11-26 12:43:58',
            ),
            1 => 
            array (
                'created_at' => '2024-03-17 03:55:16',
                'id' => 8,
                'level' => 3,
                'parent_id' => 10,
                'parent_slug' => 'deliveries',
                'percent' => '3',
                'report_id' => 0,
                'sort' => 1710656716866500000,
                'updated_at' => '2024-03-17 03:55:34',
            ),
            2 => 
            array (
                'created_at' => '2024-03-17 03:55:21',
                'id' => 9,
                'level' => 2,
                'parent_id' => 10,
                'parent_slug' => 'deliveries',
                'percent' => '3',
                'report_id' => 0,
                'sort' => 1710656721498100000,
                'updated_at' => '2024-03-17 03:55:21',
            ),
            3 => 
            array (
                'created_at' => '2024-03-17 03:55:27',
                'id' => 10,
                'level' => 1,
                'parent_id' => 10,
                'parent_slug' => 'deliveries',
                'percent' => '1',
                'report_id' => 0,
                'sort' => 1710656727407200000,
                'updated_at' => '2024-03-17 03:55:27',
            ),
            4 => 
            array (
                'created_at' => '2024-03-17 03:56:05',
                'id' => 11,
                'level' => 2,
                'parent_id' => 11,
                'parent_slug' => 'deliveries',
                'percent' => '3',
                'report_id' => 0,
                'sort' => 1710656765921400000,
                'updated_at' => '2024-03-17 03:56:05',
            ),
            5 => 
            array (
                'created_at' => '2024-03-17 03:56:15',
                'id' => 12,
                'level' => 1,
                'parent_id' => 11,
                'parent_slug' => 'deliveries',
                'percent' => '25',
                'report_id' => 26157,
                'sort' => 1710656775549100000,
                'updated_at' => '2024-05-21 12:27:14',
            ),
            6 => 
            array (
                'created_at' => '2024-04-16 07:12:24',
                'id' => 13,
                'level' => 3,
                'parent_id' => 9,
                'parent_slug' => 'deliveries',
                'percent' => '10',
                'report_id' => 65720,
                'sort' => 1713247944219000000,
                'updated_at' => '2024-11-26 12:44:35',
            ),
            7 => 
            array (
                'created_at' => '2024-04-16 07:12:28',
                'id' => 14,
                'level' => 2,
                'parent_id' => 9,
                'parent_slug' => 'deliveries',
                'percent' => '3',
                'report_id' => 0,
                'sort' => 1713247948476200000,
                'updated_at' => '2024-04-16 07:12:28',
            ),
            8 => 
            array (
                'created_at' => '2024-04-16 07:12:32',
                'id' => 15,
                'level' => 1,
                'parent_id' => 9,
                'parent_slug' => 'deliveries',
                'percent' => '1',
                'report_id' => 0,
                'sort' => 1713247952958500000,
                'updated_at' => '2024-04-16 07:12:32',
            ),
            9 => 
            array (
                'created_at' => '2024-11-26 10:58:36',
                'id' => 19,
                'level' => 3,
                'parent_id' => 12,
                'parent_slug' => 'deliveries',
                'percent' => '10',
                'report_id' => 65637,
                'sort' => 1732616916186300000,
                'updated_at' => '2024-11-26 10:58:36',
            ),
            10 => 
            array (
                'created_at' => '2025-03-10 10:05:09',
                'id' => 20,
                'level' => 3,
                'parent_id' => 13,
                'parent_slug' => 'deliveries',
                'percent' => '20',
                'report_id' => 0,
                'sort' => 1741599309465800000,
                'updated_at' => '2025-03-10 10:05:09',
            ),
            11 => 
            array (
                'created_at' => '2025-03-10 10:05:15',
                'id' => 21,
                'level' => 2,
                'parent_id' => 13,
                'parent_slug' => 'deliveries',
                'percent' => '10',
                'report_id' => 0,
                'sort' => 1741599315946100000,
                'updated_at' => '2025-03-10 10:05:15',
            ),
            12 => 
            array (
                'created_at' => '2025-03-10 10:05:21',
                'id' => 22,
                'level' => 1,
                'parent_id' => 13,
                'parent_slug' => 'deliveries',
                'percent' => '5',
                'report_id' => 0,
                'sort' => 1741599321791300000,
                'updated_at' => '2025-03-10 10:05:21',
            ),
        ));
        
        
    }
}
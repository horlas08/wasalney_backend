<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ArStatusTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('ar_status')->delete();
        
        \DB::table('ar_status')->insert(array (
            0 => 
            array (
                'created_at' => '2025-03-15 08:51:45',
                'id' => 1,
                'parent_id' => 1,
                'parent_slug' => 'orders',
                'report_id' => 200155,
                'sort' => 1742026905173200000,
                'status' => 1,
                'updated_at' => '2025-03-15 08:51:45',
            ),
            1 => 
            array (
                'created_at' => '2025-03-15 08:51:49',
                'id' => 2,
                'parent_id' => 1,
                'parent_slug' => 'orders',
                'report_id' => 200162,
                'sort' => 1742026909332800000,
                'status' => 2,
                'updated_at' => '2025-03-15 08:51:49',
            ),
            2 => 
            array (
                'created_at' => '2025-03-15 09:46:50',
                'id' => 3,
                'parent_id' => 1,
                'parent_slug' => 'orders',
                'report_id' => 200180,
                'sort' => 1742030210615000000,
                'status' => 3,
                'updated_at' => '2025-03-15 09:46:50',
            ),
            3 => 
            array (
                'created_at' => '2025-03-15 09:46:53',
                'id' => 4,
                'parent_id' => 1,
                'parent_slug' => 'orders',
                'report_id' => 200184,
                'sort' => 1742030213781800000,
                'status' => 4,
                'updated_at' => '2025-03-15 09:46:53',
            ),
            4 => 
            array (
                'created_at' => '2025-03-15 09:46:56',
                'id' => 5,
                'parent_id' => 1,
                'parent_slug' => 'orders',
                'report_id' => 200187,
                'sort' => 1742030216007900000,
                'status' => 5,
                'updated_at' => '2025-03-15 09:46:56',
            ),
            5 => 
            array (
                'created_at' => '2025-03-15 09:46:56',
                'id' => 6,
                'parent_id' => 1,
                'parent_slug' => 'orders',
                'report_id' => 200188,
                'sort' => 1742030216363400000,
                'status' => 6,
                'updated_at' => '2025-03-15 09:46:56',
            ),
            6 => 
            array (
                'created_at' => '2025-03-15 11:21:52',
                'id' => 9,
                'parent_id' => 4,
                'parent_slug' => 'orders',
                'report_id' => 200232,
                'sort' => 1742035912631000000,
                'status' => 1,
                'updated_at' => '2025-03-15 11:21:52',
            ),
            7 => 
            array (
                'created_at' => '2025-03-17 11:26:39',
                'id' => 19,
                'parent_id' => 4,
                'parent_slug' => 'orders',
                'report_id' => 200432,
                'sort' => 1742208999399700000,
                'status' => 2,
                'updated_at' => '2025-03-17 11:26:39',
            ),
            8 => 
            array (
                'created_at' => '2025-03-17 11:27:11',
                'id' => 20,
                'parent_id' => 4,
                'parent_slug' => 'orders',
                'report_id' => 200440,
                'sort' => 1742209031581800000,
                'status' => 3,
                'updated_at' => '2025-03-17 11:27:11',
            ),
            9 => 
            array (
                'created_at' => '2025-03-17 11:27:15',
                'id' => 21,
                'parent_id' => 4,
                'parent_slug' => 'orders',
                'report_id' => 200442,
                'sort' => 1742209035997500000,
                'status' => 4,
                'updated_at' => '2025-03-17 11:27:15',
            ),
            10 => 
            array (
                'created_at' => '2025-03-17 11:27:17',
                'id' => 22,
                'parent_id' => 4,
                'parent_slug' => 'orders',
                'report_id' => 200445,
                'sort' => 1742209037519900000,
                'status' => 5,
                'updated_at' => '2025-03-17 11:27:17',
            ),
            11 => 
            array (
                'created_at' => '2025-03-17 11:27:17',
                'id' => 23,
                'parent_id' => 4,
                'parent_slug' => 'orders',
                'report_id' => 200446,
                'sort' => 1742209037552400000,
                'status' => 6,
                'updated_at' => '2025-03-17 11:27:17',
            ),
            12 => 
            array (
                'created_at' => '2025-03-17 11:28:34',
                'id' => 25,
                'parent_id' => 15,
                'parent_slug' => 'orders',
                'report_id' => 200470,
                'sort' => 1742209114814900000,
                'status' => 1,
                'updated_at' => '2025-03-17 11:28:34',
            ),
            13 => 
            array (
                'created_at' => '2025-03-17 11:28:59',
                'id' => 26,
                'parent_id' => 15,
                'parent_slug' => 'orders',
                'report_id' => 200480,
                'sort' => 1742209139967300000,
                'status' => 2,
                'updated_at' => '2025-03-17 11:28:59',
            ),
            14 => 
            array (
                'created_at' => '2025-03-17 11:29:03',
                'id' => 27,
                'parent_id' => 15,
                'parent_slug' => 'orders',
                'report_id' => 200483,
                'sort' => 1742209143682600000,
                'status' => 2,
                'updated_at' => '2025-03-17 11:29:03',
            ),
            15 => 
            array (
                'created_at' => '2025-03-17 11:29:49',
                'id' => 28,
                'parent_id' => 16,
                'parent_slug' => 'orders',
                'report_id' => 200495,
                'sort' => 1742209189307500000,
                'status' => 1,
                'updated_at' => '2025-03-17 11:29:49',
            ),
            16 => 
            array (
                'created_at' => '2025-03-17 11:31:01',
                'id' => 29,
                'parent_id' => 15,
                'parent_slug' => 'orders',
                'report_id' => 200505,
                'sort' => 1742209261486400000,
                'status' => 3,
                'updated_at' => '2025-03-17 11:31:01',
            ),
            17 => 
            array (
                'created_at' => '2025-03-17 11:31:02',
                'id' => 30,
                'parent_id' => 15,
                'parent_slug' => 'orders',
                'report_id' => 200507,
                'sort' => 1742209262926900000,
                'status' => 4,
                'updated_at' => '2025-03-17 11:31:02',
            ),
            18 => 
            array (
                'created_at' => '2025-03-17 11:31:11',
                'id' => 31,
                'parent_id' => 15,
                'parent_slug' => 'orders',
                'report_id' => 200510,
                'sort' => 1742209271523400000,
                'status' => 5,
                'updated_at' => '2025-03-17 11:31:11',
            ),
            19 => 
            array (
                'created_at' => '2025-03-17 11:31:11',
                'id' => 32,
                'parent_id' => 15,
                'parent_slug' => 'orders',
                'report_id' => 200511,
                'sort' => 1742209271598000000,
                'status' => 6,
                'updated_at' => '2025-03-17 11:31:11',
            ),
            20 => 
            array (
                'created_at' => '2025-03-17 11:31:21',
                'id' => 33,
                'parent_id' => 16,
                'parent_slug' => 'orders',
                'report_id' => 200520,
                'sort' => 1742209281469100000,
                'status' => 2,
                'updated_at' => '2025-03-17 11:31:21',
            ),
            21 => 
            array (
                'created_at' => '2025-03-17 11:32:50',
                'id' => 34,
                'parent_id' => 16,
                'parent_slug' => 'orders',
                'report_id' => 200531,
                'sort' => 1742209370966400000,
                'status' => 7,
                'updated_at' => '2025-03-17 11:32:50',
            ),
            22 => 
            array (
                'created_at' => '2025-03-17 13:58:39',
                'id' => 36,
                'parent_id' => 18,
                'parent_slug' => 'orders',
                'report_id' => 200550,
                'sort' => 1742218119463200000,
                'status' => 1,
                'updated_at' => '2025-03-17 13:58:39',
            ),
        ));
        
        
    }
}
<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ArWorkerPriceTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('ar_worker_price')->delete();
        
        \DB::table('ar_worker_price')->insert(array (
            0 => 
            array (
                'created_at' => '2024-02-05 06:00:16',
                'description' => 'سعر العامل 20,000 دينار',
                'id' => 1,
                'name' => 'عدد العمال',
                'parent_id' => 9,
                'parent_slug' => 'deliveries',
                'price' => 12000.0,
                'report_id' => 0,
                'sort' => 1707109216416100000,
                'updated_at' => '2024-09-16 09:33:50',
            ),
            1 => 
            array (
                'created_at' => '2024-05-18 09:17:22',
                'description' => 'سعر العامل 20,000 دينار',
                'id' => 2,
                'name' => 'عدد العمال',
                'parent_id' => 10,
                'parent_slug' => 'deliveries',
                'price' => 20000.0,
                'report_id' => 0,
                'sort' => 1716020242491200000,
                'updated_at' => '2024-09-16 09:19:04',
            ),
            2 => 
            array (
                'created_at' => '2024-05-18 12:20:59',
                'description' => 'سعر العامل 20,000 دينار',
                'id' => 3,
                'name' => 'عدد العمال',
                'parent_id' => 11,
                'parent_slug' => 'deliveries',
                'price' => 12000.0,
                'report_id' => 0,
                'sort' => 1716031259831800000,
                'updated_at' => '2024-09-16 09:05:08',
            ),
        ));
        
        
    }
}
<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ArHeavyEquipmentTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('ar_heavy_equipment')->delete();
        
        \DB::table('ar_heavy_equipment')->insert(array (
            0 => 
            array (
                'created_at' => '2024-02-05 05:11:36',
                'description' => '7 مقاعىد',
                'icon' => 'heavy_equipment/icon/1707106296.svg',
                'id' => 1,
                'name' => 'طخم',
                'parent_id' => 9,
                'parent_slug' => 'deliveries',
                'price' => 10000.0,
                'report_id' => 0,
                'sort' => 1707106296303600000,
                'updated_at' => '2024-09-16 09:33:16',
            ),
            1 => 
            array (
                'created_at' => '2024-02-05 05:20:14',
                'description' => '2 باب',
                'icon' => 'heavy_equipment/icon/1707106814.svg',
                'id' => 2,
                'name' => 'ثلاجة',
                'parent_id' => 9,
                'parent_slug' => 'deliveries',
                'price' => 5000.0,
                'report_id' => 0,
                'sort' => 1707106814280200000,
                'updated_at' => '2024-09-16 09:30:47',
            ),
            2 => 
            array (
                'created_at' => '2024-02-21 18:48:01',
                'description' => 'اكثر من 10 كيلو غرام',
                'icon' => NULL,
                'id' => 3,
                'name' => 'ادوات ثقيلة',
                'parent_id' => 10,
                'parent_slug' => 'deliveries',
                'price' => 15000.0,
                'report_id' => 0,
                'sort' => 1708537681509100000,
                'updated_at' => '2024-09-16 09:18:34',
            ),
            3 => 
            array (
                'created_at' => '2024-03-17 03:53:43',
                'description' => 'يحتاج الى 2 عمال للنقل',
                'icon' => 'heavy_equipment/icon/1710656623.svg',
                'id' => 4,
                'name' => 'حمل ثقيل',
                'parent_id' => 11,
                'parent_slug' => 'deliveries',
                'price' => 5000.0,
                'report_id' => 0,
                'sort' => 1710656623493700000,
                'updated_at' => '2024-09-16 09:09:04',
            ),
            4 => 
            array (
                'created_at' => '2024-03-17 03:53:59',
                'description' => 'يحتاج لعامل واحد للنقل',
                'icon' => NULL,
                'id' => 5,
                'name' => 'حمل خفيف',
                'parent_id' => 11,
                'parent_slug' => 'deliveries',
                'price' => 2000.0,
                'report_id' => 0,
                'sort' => 1710656639169100000,
                'updated_at' => '2024-09-16 09:08:26',
            ),
            5 => 
            array (
                'created_at' => '2024-05-21 12:29:37',
                'description' => 'كبيرة',
                'icon' => NULL,
                'id' => 6,
                'name' => 'شاشة',
                'parent_id' => 9,
                'parent_slug' => 'deliveries',
                'price' => 500.0,
                'report_id' => 43858,
                'sort' => 1716290977795100000,
                'updated_at' => '2024-09-16 09:32:41',
            ),
            6 => 
            array (
                'created_at' => '2024-05-21 12:36:54',
                'description' => NULL,
                'icon' => NULL,
                'id' => 7,
                'name' => 'غرفة نوم',
                'parent_id' => 9,
                'parent_slug' => 'deliveries',
                'price' => 500.0,
                'report_id' => 43857,
                'sort' => 1716291414209000000,
                'updated_at' => '2024-09-16 09:31:47',
            ),
            7 => 
            array (
                'created_at' => '2024-05-21 12:38:09',
                'description' => 'منزلية',
                'icon' => 'heavy_equipment/icon/1716291489_گاو-صندوق-خانگی.jpg',
                'id' => 8,
                'name' => 'قاصة',
                'parent_id' => 9,
                'parent_slug' => 'deliveries',
                'price' => 500.0,
                'report_id' => 43854,
                'sort' => 1716291489862200000,
                'updated_at' => '2024-09-16 09:28:54',
            ),
        ));
        
        
    }
}
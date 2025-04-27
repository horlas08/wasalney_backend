<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ArStatusesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('ar_statuses')->delete();
        
        \DB::table('ar_statuses')->insert(array (
            0 => 
            array (
                'created_at' => '2024-01-07 08:37:53',
                'id' => 1,
                'parent_id' => NULL,
                'parent_slug' => NULL,
                'report_id' => 42843,
                'sort' => 1704625673449000000,
                'title' => 'تسجيل الطلب',
                'updated_at' => '2024-09-03 07:37:54',
            ),
            1 => 
            array (
                'created_at' => '2024-01-07 08:38:04',
                'id' => 2,
                'parent_id' => NULL,
                'parent_slug' => NULL,
                'report_id' => 43181,
                'sort' => 1704625684076100000,
                'title' => 'تم قبول طلبك',
                'updated_at' => '2024-09-09 09:49:05',
            ),
            2 => 
            array (
                'created_at' => '2024-01-07 08:38:12',
                'id' => 3,
                'parent_id' => NULL,
                'parent_slug' => NULL,
                'report_id' => 43182,
                'sort' => 1704625692815800000,
                'title' => 'الوصول إلى نقطة الانطلاق',
                'updated_at' => '2024-09-09 09:49:15',
            ),
            3 => 
            array (
                'created_at' => '2024-01-07 08:38:21',
                'id' => 4,
                'parent_id' => NULL,
                'parent_slug' => NULL,
                'report_id' => 43183,
                'sort' => 1704625701351200000,
                'title' => 'استلام الشحنة',
                'updated_at' => '2024-09-09 09:49:24',
            ),
            4 => 
            array (
                'created_at' => '2024-01-07 08:38:30',
                'id' => 5,
                'parent_id' => NULL,
                'parent_slug' => NULL,
                'report_id' => 42847,
                'sort' => 1704625710572600000,
                'title' => 'الوصول إلى الوجهة',
                'updated_at' => '2024-09-03 07:39:31',
            ),
            5 => 
            array (
                'created_at' => '2024-01-07 08:38:39',
                'id' => 6,
                'parent_id' => NULL,
                'parent_slug' => NULL,
                'report_id' => 42848,
                'sort' => 1704625719369400000,
                'title' => 'نهاية الرحلة',
                'updated_at' => '2024-09-03 07:39:45',
            ),
            6 => 
            array (
                'created_at' => '2024-01-14 05:59:44',
                'id' => 7,
                'parent_id' => NULL,
                'parent_slug' => NULL,
                'report_id' => 42849,
                'sort' => 1705220984700700000,
                'title' => 'إلغاء الطلب',
                'updated_at' => '2024-09-03 07:40:23',
            ),
        ));
        
        
    }
}
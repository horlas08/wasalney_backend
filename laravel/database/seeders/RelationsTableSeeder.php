<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class RelationsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('relations')->delete();
        
        \DB::table('relations')->insert(array (
            0 => 
            array (
                'created_at' => '2023-12-23 10:56:11',
                'id' => 30,
                'src_cat_slug' => 'deliveries',
                'sub_cat_slug' => 'stop_on_way',
                'title' => 'توقف در مسیر',
                'updated_at' => '2023-12-23 10:56:11',
            ),
            1 => 
            array (
                'created_at' => '2023-12-23 11:03:47',
                'id' => 31,
                'src_cat_slug' => 'orders',
                'sub_cat_slug' => 'status',
                'title' => 'وضعیت',
                'updated_at' => '2023-12-23 11:03:47',
            ),
            2 => 
            array (
                'created_at' => '2023-12-24 02:04:10',
                'id' => 32,
                'src_cat_slug' => 'deliveries',
                'sub_cat_slug' => 'heavy_equipment',
                'title' => 'وسایل سنگین',
                'updated_at' => '2023-12-24 02:04:10',
            ),
            3 => 
            array (
                'created_at' => '2023-12-24 04:02:31',
                'id' => 33,
                'src_cat_slug' => 'deliveries',
                'sub_cat_slug' => 'worker_price',
                'title' => 'تعیین قیمت کارگر',
                'updated_at' => '2023-12-24 04:02:31',
            ),
            4 => 
            array (
                'created_at' => '2023-12-24 04:04:40',
                'id' => 34,
                'src_cat_slug' => 'deliveries',
                'sub_cat_slug' => 'price_floors',
                'title' => 'تحديد سعر الطوابق',
                'updated_at' => '2024-09-18 07:30:19',
            ),
            5 => 
            array (
                'created_at' => '2023-12-24 06:01:54',
                'id' => 35,
                'src_cat_slug' => 'deliveries',
                'sub_cat_slug' => 'cancel_trip',
                'title' => 'دلایل لغو پس از قبول راننده',
                'updated_at' => '2023-12-24 06:01:54',
            ),
            6 => 
            array (
                'created_at' => '2023-12-24 06:02:21',
                'id' => 36,
                'src_cat_slug' => 'deliveries',
                'sub_cat_slug' => 'cancel_request',
                'title' => 'دلایل لغو پیش از قبول راننده',
                'updated_at' => '2023-12-24 06:02:21',
            ),
            7 => 
            array (
                'created_at' => '2023-12-24 06:29:28',
                'id' => 37,
                'src_cat_slug' => 'orders',
                'sub_cat_slug' => 'path_info',
                'title' => 'اطلاعات مسیر',
                'updated_at' => '2023-12-24 06:29:28',
            ),
            8 => 
            array (
                'created_at' => '2023-12-24 06:30:10',
                'id' => 38,
                'src_cat_slug' => 'users',
                'sub_cat_slug' => 'wallet',
                'title' => 'کیف پول',
                'updated_at' => '2023-12-24 06:30:10',
            ),
            9 => 
            array (
                'created_at' => '2024-01-09 02:09:39',
                'id' => 39,
                'src_cat_slug' => 'drivers',
                'sub_cat_slug' => 'car_details',
                'title' => 'مشخصات ماشین',
                'updated_at' => '2024-01-09 02:09:39',
            ),
            10 => 
            array (
                'created_at' => '2024-01-09 02:17:28',
                'id' => 40,
                'src_cat_slug' => 'drivers',
                'sub_cat_slug' => 'documents',
                'title' => 'مدارک',
                'updated_at' => '2024-01-09 02:17:28',
            ),
            11 => 
            array (
                'created_at' => '2024-01-21 06:51:34',
                'id' => 41,
                'src_cat_slug' => 'drivers',
                'sub_cat_slug' => 'wallet',
                'title' => 'کیف پول',
                'updated_at' => '2024-01-21 06:51:34',
            ),
            12 => 
            array (
                'created_at' => '2024-01-21 07:50:32',
                'id' => 42,
                'src_cat_slug' => 'deliveries',
                'sub_cat_slug' => 'commission',
                'title' => 'کمیسیون',
                'updated_at' => '2024-01-21 07:50:32',
            ),
            13 => 
            array (
                'created_at' => '2024-01-24 09:08:42',
                'id' => 43,
                'src_cat_slug' => 'drivers',
                'sub_cat_slug' => 'cancel_driver',
                'title' => 'سفارشات لغو کرده',
                'updated_at' => '2024-01-24 09:08:42',
            ),
            14 => 
            array (
                'created_at' => '2024-01-29 05:59:19',
                'id' => 44,
                'src_cat_slug' => 'drivers',
                'sub_cat_slug' => 'info_bank',
                'title' => 'اطلاعات بانکی',
                'updated_at' => '2024-01-29 05:59:19',
            ),
            15 => 
            array (
                'created_at' => '2024-02-06 07:12:03',
                'id' => 45,
                'src_cat_slug' => 'moving_order_details',
                'sub_cat_slug' => 'equipment_detail',
                'title' => 'وسایل',
                'updated_at' => '2024-02-06 07:12:03',
            ),
            16 => 
            array (
                'created_at' => '2024-03-04 03:12:24',
                'id' => 47,
                'src_cat_slug' => 'users',
                'sub_cat_slug' => 'repetitive_place',
                'title' => 'مسیرهای پرتکرار',
                'updated_at' => '2024-03-04 03:12:24',
            ),
            17 => 
            array (
                'created_at' => '2024-04-22 08:18:16',
                'id' => 56,
                'src_cat_slug' => 'orders',
                'sub_cat_slug' => 'price_detail',
                'title' => 'جزئیات قیمت سرویس',
                'updated_at' => '2024-04-22 09:27:07',
            ),
            18 => 
            array (
                'created_at' => '2024-06-22 05:24:21',
                'id' => 57,
                'src_cat_slug' => 'users',
                'sub_cat_slug' => 'rate_user',
                'title' => 'امتیاز ها',
                'updated_at' => '2024-06-22 05:24:21',
            ),
            19 => 
            array (
                'created_at' => '2024-08-10 11:44:24',
                'id' => 58,
                'src_cat_slug' => 'gift_cart',
                'sub_cat_slug' => 'discount_order',
                'title' => 'سفارشات',
                'updated_at' => '2024-08-10 11:44:24',
            ),
            20 => 
            array (
                'created_at' => '2024-08-20 06:22:09',
                'id' => 59,
                'src_cat_slug' => 'generate_code',
                'sub_cat_slug' => 'info_code',
                'title' => 'کد های شارژ',
                'updated_at' => '2024-08-20 06:22:09',
            ),
            21 => 
            array (
                'created_at' => '2024-09-18 12:45:17',
                'id' => 60,
                'src_cat_slug' => 'generate_code_driver',
                'sub_cat_slug' => 'info_code_driver',
                'title' => 'معلومات رمز الرصید السائق',
                'updated_at' => '2024-09-18 12:45:17',
            ),
            22 => 
            array (
                'created_at' => '2024-12-11 12:39:17',
                'id' => 61,
                'src_cat_slug' => 'orders',
                'sub_cat_slug' => 'drivers_send',
                'title' => 'رانندگان',
                'updated_at' => '2024-12-11 12:39:17',
            ),
            23 => 
            array (
                'created_at' => '2025-03-02 12:46:03',
                'id' => 62,
                'src_cat_slug' => 'orders',
                'sub_cat_slug' => 'message',
                'title' => 'پیام ها',
                'updated_at' => '2025-03-02 12:46:03',
            ),
            24 => 
            array (
                'created_at' => '2025-03-10 11:04:39',
                'id' => 63,
                'src_cat_slug' => 'deliveries',
                'sub_cat_slug' => 'taxi_options',
                'title' => 'آپشن های سواری',
                'updated_at' => '2025-03-10 11:05:00',
            ),
            25 => 
            array (
                'created_at' => '2025-03-15 09:11:25',
                'id' => 64,
                'src_cat_slug' => 'deliveries',
                'sub_cat_slug' => 'stop_without_driver',
                'title' => 'زمان توقف بدون راننده',
                'updated_at' => '2025-03-15 12:15:00',
            ),
        ));
        
        
    }
}
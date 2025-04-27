<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ArAgencyAdminTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('ar_agency_admin')->delete();
        
        \DB::table('ar_agency_admin')->insert(array (
            0 => 
            array (
                'address' => NULL,
                'commission' => NULL,
                'created_at' => '2024-07-27 12:05:15',
                'email' => NULL,
                'id' => 1,
                'image' => NULL,
                'level' => 1.0,
                'name' => 'Agancy',
                'notif_token' => NULL,
                'number' => NULL,
                'parent_id' => NULL,
                'parent_slug' => NULL,
                'password' => '$2y$10$gld2Y1tucU1RKXGaGzJdrOirrASR0njXFIR1WsQt6CAHTsVLHp2LK',
                'report_id' => 0,
                'sort' => 1722078315621800000,
                'title' => NULL,
                'updated_at' => '2024-07-28 05:11:41',
                'username' => 'agancy1',
            ),
            1 => 
            array (
                'address' => 'تهران ، منطقه 2 ، شهرک غرب',
                'commission' => 5.0,
                'created_at' => '2024-07-28 06:12:19',
                'email' => NULL,
                'id' => 7,
                'image' => 'agency_admin/image/1722239401_img.png',
                'level' => 2.0,
                'name' => 'Agancy2',
                'notif_token' => 'c07fe1ec-738a-4160-82ec-88e66ad04bb1',
                'number' => NULL,
                'parent_id' => NULL,
                'parent_slug' => NULL,
                'password' => '$2y$10$o2zqyjrz888GelcD4EN5ZeUZVoq56eoVjshLZ.qh2GP40slEdQmLm',
                'report_id' => 0,
                'sort' => NULL,
                'title' => 'آژانس تاکسی رانی ماهشهر',
                'updated_at' => '2024-08-04 09:55:33',
                'username' => 'agancy2',
            ),
        ));
        
        
    }
}
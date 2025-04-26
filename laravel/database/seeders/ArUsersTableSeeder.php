<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ArUsersTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('ar_users')->delete();
        
        \DB::table('ar_users')->insert(array (
            0 => 
            array (
                'address' => NULL,
                'birth_date' => NULL,
                'code' => 'c774731',
                'created_at' => '2025-03-15 08:14:27',
                'credit' => NULL,
                'email' => NULL,
                'fcm_token' => 'fFQThQuIT8KPK7PZQl4fUM:APA91bHmJGA_cXhBStuoP2GAZkNFSO0bwfi7lvpMOaRcKDwAhch1b9Ml8WJSz0d8DvjwtM-av-JrofZjShLTaDJGUf_KhTALZy_D607h-7qg1H59hu1WEbk',
                'id' => 1,
                'image' => NULL,
                'intro_code' => NULL,
                'mobile' => '09104992005',
                'name' => 'shayan',
                'notif_token' => '67d52fdbe4708',
                'parent_id' => NULL,
                'parent_slug' => NULL,
                'report_id' => 200357,
                'sort' => 1742024667935200000,
                'updated_at' => '2025-03-16 07:46:10',
                'verify_code' => NULL,
            ),
            1 => 
            array (
                'address' => NULL,
                'birth_date' => NULL,
                'code' => 'c156094',
                'created_at' => '2025-03-15 08:45:37',
                'credit' => NULL,
                'email' => NULL,
                'fcm_token' => 'c6zCr2y0sd9VQpBiMhYXlD:APA91bEQ0YtAk64f_nFr3z4AgVeGzDPzWWgJfkJV-ro4FNWEwLTiRCB5tSXOpYRnweLCOqE5BWh12FZd3F9aoH2P9aldTKl--1q0CTYljrUIbv04Jzp1-54',
                'id' => 2,
                'image' => NULL,
                'intro_code' => NULL,
                'mobile' => '09900733439',
                'name' => 'تست',
                'notif_token' => '67d53729dd2b9',
                'parent_id' => NULL,
                'parent_slug' => NULL,
                'report_id' => 200595,
                'sort' => 1742026537905600000,
                'updated_at' => '2025-03-18 06:01:05',
                'verify_code' => '',
            ),
            2 => 
            array (
                'address' => NULL,
                'birth_date' => NULL,
                'code' => 'c144652',
                'created_at' => '2025-03-15 09:39:18',
                'credit' => NULL,
                'email' => NULL,
                'fcm_token' => 'dtUqsLx6RTGJN7FaM62XeZ:APA91bFHRRba2ceykBkYmRBAwjuHYgViyOmbBF5AJ0x4SU3hUVtE_MaO1V2pn1EcWDrE-39fkzS00cpkVEWjcSiKoVXjWyBDi3gM-HnoLLeLfU8_3V4RdY8',
                'id' => 3,
                'image' => NULL,
                'intro_code' => NULL,
                'mobile' => '07729633336',
                'name' => 'علی',
                'notif_token' => '67d543be62c0d',
                'parent_id' => NULL,
                'parent_slug' => NULL,
                'report_id' => 200557,
                'sort' => 1742029758404000000,
                'updated_at' => '2025-03-17 14:00:59',
                'verify_code' => '',
            ),
            3 => 
            array (
                'address' => NULL,
                'birth_date' => NULL,
                'code' => 'c124047',
                'created_at' => '2025-03-17 13:53:48',
                'credit' => NULL,
                'email' => NULL,
                'fcm_token' => 'dzrnO9yvR92NC9IvmZd7da:APA91bGZXv4tMCm2-M1001pzjsqgyBwHKNnCB7nXMvwp4s3cTzgETrROG-9cm9nZ2m5Bix91hl4eiPpQfMLAKbh1pWFKdFXKD7qoCOgS7F7vZlgNMmIrq9E',
                'id' => 4,
                'image' => NULL,
                'intro_code' => NULL,
                'mobile' => '07805754917',
                'name' => 'كاظم بربر',
                'notif_token' => '67d82264070de',
                'parent_id' => NULL,
                'parent_slug' => NULL,
                'report_id' => 200558,
                'sort' => 1742217828028400000,
                'updated_at' => '2025-03-17 14:13:56',
                'verify_code' => NULL,
            ),
            4 => 
            array (
                'address' => NULL,
                'birth_date' => NULL,
                'code' => 'c134234',
                'created_at' => '2025-03-17 14:16:12',
                'credit' => NULL,
                'email' => 'ali@gmail.com',
                'fcm_token' => NULL,
                'id' => 5,
                'image' => 'users/image/1742284565.jpeg',
                'intro_code' => '964',
                'mobile' => '07723119465',
                'name' => 'ali saadi',
                'notif_token' => '67d827a4a29b2',
                'parent_id' => NULL,
                'parent_slug' => NULL,
                'report_id' => 200600,
                'sort' => 1742219172665700000,
                'updated_at' => '2025-03-18 08:27:09',
                'verify_code' => NULL,
            ),
        ));
        
        
    }
}
<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class RoutesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('routes')->delete();
        
        \DB::table('routes')->insert(array (
            0 => 
            array (
                'address' => 'test',
                'changefreq' => 'yearly',
                'created_at' => '2023-12-31 08:40:40',
                'field_id' => NULL,
                'id' => 1,
                'priority' => 0.5,
                'role_id' => NULL,
                'title' => 'تست',
                'updated_at' => '2023-12-31 08:43:52',
                'view' => 'index',
            ),
            1 => 
            array (
                'address' => 'about',
                'changefreq' => 'yearly',
                'created_at' => '2024-10-26 13:00:00',
                'field_id' => NULL,
                'id' => 2,
                'priority' => 0.5,
                'role_id' => NULL,
                'title' => 'درباره ما',
                'updated_at' => '2024-10-26 13:00:00',
                'view' => 'about',
            ),
            2 => 
            array (
                'address' => 'contact',
                'changefreq' => 'yearly',
                'created_at' => '2024-10-26 13:00:49',
                'field_id' => NULL,
                'id' => 3,
                'priority' => 0.5,
                'role_id' => NULL,
                'title' => 'تماس با ما',
                'updated_at' => '2024-10-26 13:00:49',
                'view' => 'contact',
            ),
            3 => 
            array (
                'address' => 'terms',
                'changefreq' => 'yearly',
                'created_at' => '2024-10-26 13:01:07',
                'field_id' => NULL,
                'id' => 4,
                'priority' => 0.5,
                'role_id' => NULL,
                'title' => 'قوانین',
                'updated_at' => '2024-12-15 06:29:25',
                'view' => 'terms',
            ),
            4 => 
            array (
                'address' => 'privacy-policy',
                'changefreq' => 'yearly',
                'created_at' => '2024-12-15 06:30:51',
                'field_id' => NULL,
                'id' => 5,
                'priority' => 0.5,
                'role_id' => NULL,
                'title' => 'privacy-policy',
                'updated_at' => '2024-12-15 06:30:51',
                'view' => 'privacy-policy',
            ),
        ));
        
        
    }
}
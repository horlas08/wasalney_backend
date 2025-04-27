<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ArSliderTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('ar_slider')->delete();
        
        \DB::table('ar_slider')->insert(array (
            0 => 
            array (
                'created_at' => '2024-08-04 11:56:40',
                'id' => 16,
                'image' => 'slider/image/1740982376_ed0f4e93b5891e7021a634ee72a7fb66.png',
                'link' => NULL,
                'parent_id' => NULL,
                'parent_slug' => NULL,
                'report_id' => 0,
                'sort' => 1722769000025400000,
                'updated_at' => '2025-03-03 06:42:56',
            ),
            1 => 
            array (
                'created_at' => '2025-03-18 08:23:35',
                'id' => 18,
                'image' => 'slider/image/1742284415_صورة المبنى.webp',
                'link' => 'https://translate.google.com',
                'parent_id' => NULL,
                'parent_slug' => NULL,
                'report_id' => 200596,
                'sort' => 1742284415075100000,
                'updated_at' => '2025-03-18 08:23:35',
            ),
        ));
        
        
    }
}
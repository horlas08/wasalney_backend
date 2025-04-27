<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ArTypeParcelTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('ar_type_parcel')->delete();
        
        \DB::table('ar_type_parcel')->insert(array (
            0 => 
            array (
                'created_at' => '2023-12-31 06:12:40',
                'id' => 1,
                'parent_id' => NULL,
                'parent_slug' => NULL,
                'report_id' => 200303,
                'sort' => 1704012160561700000,
                'title' => 'هدیه',
                'updated_at' => '2025-03-16 00:21:35',
            ),
            1 => 
            array (
                'created_at' => '2024-05-21 06:50:19',
                'id' => 5,
                'parent_id' => NULL,
                'parent_slug' => NULL,
                'report_id' => 200318,
                'sort' => 1716270619960800000,
                'title' => 'ملابس',
                'updated_at' => '2025-03-16 00:23:17',
            ),
        ));
        
        
    }
}
<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ArPriceParcelTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('ar_price_parcel')->delete();
        
        \DB::table('ar_price_parcel')->insert(array (
            0 => 
            array (
                'created_at' => '2024-05-21 08:58:16',
                'id' => 2,
                'parent_id' => NULL,
                'parent_slug' => NULL,
                'price' => 50000.0,
                'report_id' => 200333,
                'sort' => 1716278296145700000,
                'title' => 'الی 50 الاف',
                'updated_at' => '2025-03-16 00:26:29',
            ),
            1 => 
            array (
                'created_at' => '2024-05-21 09:01:24',
                'id' => 3,
                'parent_id' => NULL,
                'parent_slug' => NULL,
                'price' => 25000.0,
                'report_id' => 200332,
                'sort' => 1716278484417200000,
                'title' => 'الی 25 الاف',
                'updated_at' => '2025-03-16 00:26:07',
            ),
            2 => 
            array (
                'created_at' => '2024-05-21 09:02:46',
                'id' => 4,
                'parent_id' => NULL,
                'parent_slug' => NULL,
                'price' => 10000.0,
                'report_id' => 200331,
                'sort' => 1716278566466200000,
                'title' => 'الی 10 الاف',
                'updated_at' => '2025-03-16 00:25:40',
            ),
        ));
        
        
    }
}
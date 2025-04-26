<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ArCarDetailsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('ar_car_details')->delete();
        
        \DB::table('ar_car_details')->insert(array (
            0 => 
            array (
                'car_tag' => '67765',
                'color' => 'ghg',
                'created_at' => '2025-03-15 08:50:14',
                'fuel_type' => 2,
                'id' => 1,
                'model' => 'fhh',
                'parent_id' => 1,
                'parent_slug' => 'drivers',
                'report_id' => 200136,
                'sort' => 1742026814812700000,
                'updated_at' => '2025-03-15 08:50:14',
                'vin' => NULL,
                'year_made' => '357',
            ),
            1 => 
            array (
                'car_tag' => '25555',
                'color' => 'اصفر',
                'created_at' => '2025-03-15 23:58:39',
                'fuel_type' => 3,
                'id' => 2,
                'model' => 'رافعه',
                'parent_id' => 2,
                'parent_slug' => 'drivers',
                'report_id' => 200251,
                'sort' => 1742081319871600000,
                'updated_at' => '2025-03-15 23:58:39',
                'vin' => NULL,
                'year_made' => '2020',
            ),
            2 => 
            array (
                'car_tag' => '754fd',
                'color' => 'سفید',
                'created_at' => '2025-03-18 05:50:06',
                'fuel_type' => 3,
                'id' => 3,
                'model' => 'بنز',
                'parent_id' => 5,
                'parent_slug' => 'drivers',
                'report_id' => 200581,
                'sort' => 1742275206642300000,
                'updated_at' => '2025-03-18 05:50:06',
                'vin' => NULL,
                'year_made' => '۷۸',
            ),
        ));
        
        
    }
}
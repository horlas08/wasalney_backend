<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ArDocumentsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('ar_documents')->delete();
        
        \DB::table('ar_documents')->insert(array (
            0 => 
            array (
                'additional_documents' => 'documents/additional_documents/1742026838.jpeg',
                'back_car_card' => 'documents/back_car_card/1742026831.jpeg',
                'created_at' => '2025-03-15 08:50:28',
                'id' => 1,
                'on_car_card' => 'documents/on_car_card/1742026828.jpeg',
                'on_certificate' => 'documents/on_certificate/1742026834.jpeg',
                'parent_id' => 1,
                'parent_slug' => 'drivers',
                'report_id' => 200143,
                'sort' => 1742026828494500000,
                'updated_at' => '2025-03-15 08:50:38',
            ),
            1 => 
            array (
                'additional_documents' => NULL,
                'back_car_card' => 'documents/back_car_card/1742081348.jpeg',
                'created_at' => '2025-03-15 23:58:59',
                'id' => 2,
                'on_car_card' => 'documents/on_car_card/1742081339.jpeg',
                'on_certificate' => 'documents/on_certificate/1742081356.jpeg',
                'parent_id' => 2,
                'parent_slug' => 'drivers',
                'report_id' => 200257,
                'sort' => 1742081339099900000,
                'updated_at' => '2025-03-15 23:59:16',
            ),
            2 => 
            array (
                'additional_documents' => NULL,
                'back_car_card' => 'documents/back_car_card/1742275224.jpeg',
                'created_at' => '2025-03-18 05:50:18',
                'id' => 3,
                'on_car_card' => 'documents/on_car_card/1742275218.jpeg',
                'on_certificate' => 'documents/on_certificate/1742275231.jpeg',
                'parent_id' => 5,
                'parent_slug' => 'drivers',
                'report_id' => 200586,
                'sort' => 1742275218801300000,
                'updated_at' => '2025-03-18 05:50:31',
            ),
        ));
        
        
    }
}
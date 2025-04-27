<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ArWalletTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('ar_wallet')->delete();
        
        \DB::table('ar_wallet')->insert(array (
            0 => 
            array (
                'code' => NULL,
                'created_at' => '2025-03-15 09:46:56',
                'description' => NULL,
                'id' => 1,
                'net_price' => 24800.0,
                'order' => 1,
                'parent_id' => 1,
                'parent_slug' => 'drivers',
                'price' => 31000.0,
                'report_id' => 200190,
                'sort' => 1742030216621300000,
                'title' => 'تخفيض العمولة للدفع النقدي من المسافر',
                'type' => 2,
                'updated_at' => '2025-03-15 09:46:56',
            ),
            1 => 
            array (
                'code' => NULL,
                'created_at' => '2025-03-15 09:46:56',
                'description' => NULL,
                'id' => 2,
                'net_price' => 24800.0,
                'order' => 1,
                'parent_id' => 1,
                'parent_slug' => 'drivers',
                'price' => 24800.0,
                'report_id' => 200191,
                'sort' => 1742030216700000000,
                'title' => 'الزيادة بسبب الدفع النقدي المسافر',
                'type' => 1,
                'updated_at' => '2025-03-15 09:46:56',
            ),
            2 => 
            array (
                'code' => NULL,
                'created_at' => '2025-03-17 11:27:17',
                'description' => NULL,
                'id' => 3,
                'net_price' => 10400.0,
                'order' => 4,
                'parent_id' => 1,
                'parent_slug' => 'drivers',
                'price' => 13000.0,
                'report_id' => 200448,
                'sort' => 1742209037659900000,
                'title' => 'تخفيض العمولة للدفع النقدي من المسافر',
                'type' => 2,
                'updated_at' => '2025-03-17 11:27:17',
            ),
            3 => 
            array (
                'code' => NULL,
                'created_at' => '2025-03-17 11:27:17',
                'description' => NULL,
                'id' => 4,
                'net_price' => 10400.0,
                'order' => 4,
                'parent_id' => 1,
                'parent_slug' => 'drivers',
                'price' => 10400.0,
                'report_id' => 200449,
                'sort' => 1742209037703000000,
                'title' => 'الزيادة بسبب الدفع النقدي المسافر',
                'type' => 1,
                'updated_at' => '2025-03-17 11:27:17',
            ),
            4 => 
            array (
                'code' => NULL,
                'created_at' => '2025-03-17 11:31:11',
                'description' => NULL,
                'id' => 5,
                'net_price' => 4000.0,
                'order' => 15,
                'parent_id' => 1,
                'parent_slug' => 'drivers',
                'price' => 5000.0,
                'report_id' => 200513,
                'sort' => 1742209271773300000,
                'title' => 'تخفيض العمولة للدفع النقدي من المسافر',
                'type' => 2,
                'updated_at' => '2025-03-17 11:31:11',
            ),
            5 => 
            array (
                'code' => NULL,
                'created_at' => '2025-03-17 11:31:11',
                'description' => NULL,
                'id' => 6,
                'net_price' => 4000.0,
                'order' => 15,
                'parent_id' => 1,
                'parent_slug' => 'drivers',
                'price' => 4000.0,
                'report_id' => 200514,
                'sort' => 1742209271848800000,
                'title' => 'الزيادة بسبب الدفع النقدي المسافر',
                'type' => 1,
                'updated_at' => '2025-03-17 11:31:11',
            ),
        ));
        
        
    }
}
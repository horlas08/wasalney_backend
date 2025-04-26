<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ArTransactionTypesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('ar_transaction_types')->delete();
        
        \DB::table('ar_transaction_types')->insert(array (
            0 => 
            array (
                'created_at' => '2024-01-21 07:20:28',
                'id' => 1,
                'parent_id' => NULL,
                'parent_slug' => NULL,
                'report_id' => 43761,
                'sort' => 1705818028439400000,
                'title' => 'اضافة رصيد',
                'updated_at' => '2024-09-16 08:17:42',
            ),
            1 => 
            array (
                'created_at' => '2024-01-21 07:20:33',
                'id' => 2,
                'parent_id' => NULL,
                'parent_slug' => NULL,
                'report_id' => 43760,
                'sort' => 1705818033396400000,
                'title' => 'خصم الرصید',
                'updated_at' => '2024-09-16 08:17:29',
            ),
            2 => 
            array (
                'created_at' => '2024-04-17 11:37:50',
                'id' => 3,
                'parent_id' => NULL,
                'parent_slug' => NULL,
                'report_id' => 0,
                'sort' => 1713350270226500000,
                'title' => 'شحن الحساب',
                'updated_at' => '2024-09-16 08:13:44',
            ),
        ));
        
        
    }
}
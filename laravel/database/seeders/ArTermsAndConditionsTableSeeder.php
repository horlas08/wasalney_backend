<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ArTermsAndConditionsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('ar_terms_and_conditions')->delete();
        
        \DB::table('ar_terms_and_conditions')->insert(array (
            0 => 
            array (
                'created_at' => '2024-05-15 06:40:42',
                'id' => 1,
                'parent_id' => NULL,
                'parent_slug' => NULL,
                'report_id' => 45470,
                'sort' => 1715751642633600000,
                'text' => '<p>شروط و احكام تطبيق اوكي </p>',
                'updated_at' => '2024-09-21 14:12:20',
            ),
        ));
        
        
    }
}
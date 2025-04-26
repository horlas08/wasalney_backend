<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ArVoipTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('ar_voip')->delete();
        
        \DB::table('ar_voip')->insert(array (
            0 => 
            array (
                'created_at' => '2024-03-10 06:38:42',
                'gateway' => NULL,
                'id' => 1,
                'ip' => '5.202.45.89',
                'parent_id' => NULL,
                'parent_slug' => NULL,
                'pass' => 'Tehran1401Kara',
                'port' => '5038',
                'pre_trank' => NULL,
                'report_id' => 0,
                'sort' => 1710061722661200000,
                'trank' => '982191091504',
                'updated_at' => '2024-03-10 06:38:42',
                'user_name' => 'kara11',
            ),
        ));
        
        
    }
}
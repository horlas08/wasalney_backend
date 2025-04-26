<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ArRejectedOrderTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('ar_rejected_order')->delete();
        
        
        
    }
}
<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ArAcceptedOrderTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('ar_accepted_order')->delete();
        
        
        
    }
}
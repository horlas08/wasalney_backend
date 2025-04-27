<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ArAgencyAdminServicesDeliveriesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('ar_agency_admin_services_deliveries')->delete();
        
        \DB::table('ar_agency_admin_services_deliveries')->insert(array (
            0 => 
            array (
                'agency_admin_id' => 7,
                'created_at' => '2024-08-04 09:55:33',
                'deliveries_id' => 9,
                'id' => 13,
                'updated_at' => '2024-08-04 09:55:33',
            ),
        ));
        
        
    }
}
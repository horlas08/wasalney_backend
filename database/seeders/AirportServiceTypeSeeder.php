<?php

namespace Database\Seeders;

use App\Models\AirportServiceType;
use Illuminate\Database\Seeder;

class AirportServiceTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $serviceTypes = [
            [
                'name' => 'Standard Sedan',
                'name_ar' => 'سيارة سيدان قياسية',
                'type' => 'sedan',
                'base_price' => 120.00,
                'price_per_km' => 1.50,
                'free_waiting_time' => 30, // minutes
                'waiting_price_per_hour' => 40.00,
                'max_passengers' => 4,
                'active' => true
            ],
            [
                'name' => 'Premium Sedan',
                'name_ar' => 'سيارة سيدان فاخرة',
                'type' => 'premium_sedan',
                'base_price' => 200.00,
                'price_per_km' => 2.25,
                'free_waiting_time' => 45, // minutes
                'waiting_price_per_hour' => 60.00,
                'max_passengers' => 4,
                'active' => true
            ],
            [
                'name' => 'SUV',
                'name_ar' => 'سيارة دفع رباعي',
                'type' => 'suv',
                'base_price' => 180.00,
                'price_per_km' => 2.00,
                'free_waiting_time' => 40, // minutes
                'waiting_price_per_hour' => 50.00,
                'max_passengers' => 6,
                'active' => true
            ],
            [
                'name' => 'Van/Minibus',
                'name_ar' => 'حافلة صغيرة',
                'type' => 'van',
                'base_price' => 250.00,
                'price_per_km' => 2.50,
                'free_waiting_time' => 60, // minutes
                'waiting_price_per_hour' => 70.00,
                'max_passengers' => 12,
                'active' => true
            ],
            [
                'name' => 'Executive Luxury',
                'name_ar' => 'سيارة فخمة تنفيذية',
                'type' => 'luxury',
                'base_price' => 350.00,
                'price_per_km' => 3.00,
                'free_waiting_time' => 60, // minutes
                'waiting_price_per_hour' => 90.00,
                'max_passengers' => 3,
                'active' => true
            ],
        ];

        foreach ($serviceTypes as $serviceType) {
            AirportServiceType::create($serviceType);
        }
    }
}

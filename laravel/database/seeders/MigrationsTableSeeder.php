<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class MigrationsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('migrations')->delete();
        
        \DB::table('migrations')->insert(array (
            0 => 
            array (
                'batch' => 1,
                'id' => 1,
                'migration' => '2014_10_12_000000_create_users_table',
            ),
            1 => 
            array (
                'batch' => 1,
                'id' => 2,
                'migration' => '2014_10_12_100000_create_password_reset_tokens_table',
            ),
            2 => 
            array (
                'batch' => 1,
                'id' => 3,
                'migration' => '2019_08_19_000000_create_failed_jobs_table',
            ),
            3 => 
            array (
                'batch' => 1,
                'id' => 4,
                'migration' => '2019_12_14_000001_create_personal_access_tokens_table',
            ),
            4 => 
            array (
                'batch' => 1,
                'id' => 5,
                'migration' => '2023_12_04_110137_create_jobs_table',
            ),
            5 => 
            array (
                'batch' => 0,
                'id' => 6,
                'migration' => '2025_04_25_120434_create_admin_accesses_table',
            ),
            6 => 
            array (
                'batch' => 0,
                'id' => 7,
                'migration' => '2025_04_25_120434_create_admins_table',
            ),
            7 => 
            array (
                'batch' => 0,
                'id' => 8,
                'migration' => '2025_04_25_120434_create_ar_accepted_order_table',
            ),
            8 => 
            array (
                'batch' => 0,
                'id' => 9,
                'migration' => '2025_04_25_120434_create_ar_account_check_table',
            ),
            9 => 
            array (
                'batch' => 0,
                'id' => 10,
                'migration' => '2025_04_25_120434_create_ar_admin_message_table',
            ),
            10 => 
            array (
                'batch' => 0,
                'id' => 11,
                'migration' => '2025_04_25_120434_create_ar_admin_message_driver_drivers_table',
            ),
            11 => 
            array (
                'batch' => 0,
                'id' => 12,
                'migration' => '2025_04_25_120434_create_ar_admin_numbers_table',
            ),
            12 => 
            array (
                'batch' => 0,
                'id' => 13,
                'migration' => '2025_04_25_120434_create_ar_agency_admin_table',
            ),
            13 => 
            array (
                'batch' => 0,
                'id' => 14,
                'migration' => '2025_04_25_120434_create_ar_agency_admin_services_deliveries_table',
            ),
            14 => 
            array (
                'batch' => 0,
                'id' => 15,
                'migration' => '2025_04_25_120434_create_ar_banks_table',
            ),
            15 => 
            array (
                'batch' => 0,
                'id' => 16,
                'migration' => '2025_04_25_120434_create_ar_cancel_driver_table',
            ),
            16 => 
            array (
                'batch' => 0,
                'id' => 17,
                'migration' => '2025_04_25_120434_create_ar_cancel_request_table',
            ),
            17 => 
            array (
                'batch' => 0,
                'id' => 18,
                'migration' => '2025_04_25_120434_create_ar_cancel_trip_table',
            ),
            18 => 
            array (
                'batch' => 0,
                'id' => 19,
                'migration' => '2025_04_25_120434_create_ar_car_details_table',
            ),
            19 => 
            array (
                'batch' => 0,
                'id' => 20,
                'migration' => '2025_04_25_120434_create_ar_car_models_table',
            ),
            20 => 
            array (
                'batch' => 0,
                'id' => 21,
                'migration' => '2025_04_25_120434_create_ar_certificates_types_table',
            ),
            21 => 
            array (
                'batch' => 0,
                'id' => 22,
                'migration' => '2025_04_25_120434_create_ar_commission_table',
            ),
            22 => 
            array (
                'batch' => 0,
                'id' => 23,
                'migration' => '2025_04_25_120434_create_ar_condition_rate_table',
            ),
            23 => 
            array (
                'batch' => 0,
                'id' => 24,
                'migration' => '2025_04_25_120434_create_ar_cost_type_table',
            ),
            24 => 
            array (
                'batch' => 0,
                'id' => 25,
                'migration' => '2025_04_25_120434_create_ar_deliveries_table',
            ),
            25 => 
            array (
                'batch' => 0,
                'id' => 26,
                'migration' => '2025_04_25_120434_create_ar_discount_order_table',
            ),
            26 => 
            array (
                'batch' => 0,
                'id' => 27,
                'migration' => '2025_04_25_120434_create_ar_documents_table',
            ),
            27 => 
            array (
                'batch' => 0,
                'id' => 28,
                'migration' => '2025_04_25_120434_create_ar_driver_agency_table',
            ),
            28 => 
            array (
                'batch' => 0,
                'id' => 29,
                'migration' => '2025_04_25_120434_create_ar_drivers_table',
            ),
            29 => 
            array (
                'batch' => 0,
                'id' => 30,
                'migration' => '2025_04_25_120434_create_ar_drivers_send_table',
            ),
            30 => 
            array (
                'batch' => 0,
                'id' => 31,
                'migration' => '2025_04_25_120434_create_ar_equipment_detail_table',
            ),
            31 => 
            array (
                'batch' => 0,
                'id' => 32,
                'migration' => '2025_04_25_120434_create_ar_favorite_place_table',
            ),
            32 => 
            array (
                'batch' => 0,
                'id' => 33,
                'migration' => '2025_04_25_120434_create_ar_financial_report_table',
            ),
            33 => 
            array (
                'batch' => 0,
                'id' => 34,
                'migration' => '2025_04_25_120434_create_ar_financial_report_agency_table',
            ),
            34 => 
            array (
                'batch' => 0,
                'id' => 35,
                'migration' => '2025_04_25_120434_create_ar_floor_detail_table',
            ),
            35 => 
            array (
                'batch' => 0,
                'id' => 36,
                'migration' => '2025_04_25_120434_create_ar_fuel_type_table',
            ),
            36 => 
            array (
                'batch' => 0,
                'id' => 37,
                'migration' => '2025_04_25_120434_create_ar_gender_table',
            ),
            37 => 
            array (
                'batch' => 0,
                'id' => 38,
                'migration' => '2025_04_25_120434_create_ar_generate_code_table',
            ),
            38 => 
            array (
                'batch' => 0,
                'id' => 39,
                'migration' => '2025_04_25_120434_create_ar_generate_code_driver_table',
            ),
            39 => 
            array (
                'batch' => 0,
                'id' => 40,
                'migration' => '2025_04_25_120434_create_ar_gift_cart_table',
            ),
            40 => 
            array (
                'batch' => 0,
                'id' => 41,
                'migration' => '2025_04_25_120434_create_ar_gift_cart_service_deliveries_table',
            ),
            41 => 
            array (
                'batch' => 0,
                'id' => 42,
                'migration' => '2025_04_25_120434_create_ar_heavy_equipment_table',
            ),
            42 => 
            array (
                'batch' => 0,
                'id' => 43,
                'migration' => '2025_04_25_120434_create_ar_info_bank_table',
            ),
            43 => 
            array (
                'batch' => 0,
                'id' => 44,
                'migration' => '2025_04_25_120434_create_ar_info_code_table',
            ),
            44 => 
            array (
                'batch' => 0,
                'id' => 45,
                'migration' => '2025_04_25_120434_create_ar_info_code_driver_table',
            ),
            45 => 
            array (
                'batch' => 0,
                'id' => 46,
                'migration' => '2025_04_25_120434_create_ar_level_table',
            ),
            46 => 
            array (
                'batch' => 0,
                'id' => 47,
                'migration' => '2025_04_25_120434_create_ar_limit_table',
            ),
            47 => 
            array (
                'batch' => 0,
                'id' => 48,
                'migration' => '2025_04_25_120434_create_ar_message_table',
            ),
            48 => 
            array (
                'batch' => 0,
                'id' => 49,
                'migration' => '2025_04_25_120434_create_ar_minimum_price_driver_table',
            ),
            49 => 
            array (
                'batch' => 0,
                'id' => 50,
                'migration' => '2025_04_25_120434_create_ar_moving_order_details_table',
            ),
            50 => 
            array (
                'batch' => 0,
                'id' => 51,
                'migration' => '2025_04_25_120434_create_ar_order_motor_details_table',
            ),
            51 => 
            array (
                'batch' => 0,
                'id' => 52,
                'migration' => '2025_04_25_120434_create_ar_orders_table',
            ),
            52 => 
            array (
                'batch' => 0,
                'id' => 53,
                'migration' => '2025_04_25_120434_create_ar_path_info_table',
            ),
            53 => 
            array (
                'batch' => 0,
                'id' => 54,
                'migration' => '2025_04_25_120434_create_ar_pay_typs_table',
            ),
            54 => 
            array (
                'batch' => 0,
                'id' => 55,
                'migration' => '2025_04_25_120434_create_ar_prefixes_table',
            ),
            55 => 
            array (
                'batch' => 0,
                'id' => 56,
                'migration' => '2025_04_25_120434_create_ar_price_detail_table',
            ),
            56 => 
            array (
                'batch' => 0,
                'id' => 57,
                'migration' => '2025_04_25_120434_create_ar_price_floors_table',
            ),
            57 => 
            array (
                'batch' => 0,
                'id' => 58,
                'migration' => '2025_04_25_120434_create_ar_price_parcel_table',
            ),
            58 => 
            array (
                'batch' => 0,
                'id' => 59,
                'migration' => '2025_04_25_120434_create_ar_questions_table',
            ),
            59 => 
            array (
                'batch' => 0,
                'id' => 60,
                'migration' => '2025_04_25_120434_create_ar_rate_table',
            ),
            60 => 
            array (
                'batch' => 0,
                'id' => 61,
                'migration' => '2025_04_25_120434_create_ar_rate_user_table',
            ),
            61 => 
            array (
                'batch' => 0,
                'id' => 62,
                'migration' => '2025_04_25_120434_create_ar_rejected_order_table',
            ),
            62 => 
            array (
                'batch' => 0,
                'id' => 63,
                'migration' => '2025_04_25_120434_create_ar_repetitive_place_table',
            ),
            63 => 
            array (
                'batch' => 0,
                'id' => 64,
                'migration' => '2025_04_25_120434_create_ar_repetitive_routes_table',
            ),
            64 => 
            array (
                'batch' => 0,
                'id' => 65,
                'migration' => '2025_04_25_120434_create_ar_request_order_table',
            ),
            65 => 
            array (
                'batch' => 0,
                'id' => 66,
                'migration' => '2025_04_25_120434_create_ar_service_place_repitive_table',
            ),
            66 => 
            array (
                'batch' => 0,
                'id' => 67,
                'migration' => '2025_04_25_120434_create_ar_services_type_table',
            ),
            67 => 
            array (
                'batch' => 0,
                'id' => 68,
                'migration' => '2025_04_25_120434_create_ar_slider_table',
            ),
            68 => 
            array (
                'batch' => 0,
                'id' => 69,
                'migration' => '2025_04_25_120434_create_ar_state_completed_table',
            ),
            69 => 
            array (
                'batch' => 0,
                'id' => 70,
                'migration' => '2025_04_25_120434_create_ar_state_driver_table',
            ),
            70 => 
            array (
                'batch' => 0,
                'id' => 71,
                'migration' => '2025_04_25_120434_create_ar_status_table',
            ),
            71 => 
            array (
                'batch' => 0,
                'id' => 72,
                'migration' => '2025_04_25_120434_create_ar_statuses_table',
            ),
            72 => 
            array (
                'batch' => 0,
                'id' => 73,
                'migration' => '2025_04_25_120434_create_ar_stop_on_way_table',
            ),
            73 => 
            array (
                'batch' => 0,
                'id' => 74,
                'migration' => '2025_04_25_120434_create_ar_stop_without_driver_table',
            ),
            74 => 
            array (
                'batch' => 0,
                'id' => 75,
                'migration' => '2025_04_25_120434_create_ar_support_table',
            ),
            75 => 
            array (
                'batch' => 0,
                'id' => 76,
                'migration' => '2025_04_25_120434_create_ar_taxi_options_table',
            ),
            76 => 
            array (
                'batch' => 0,
                'id' => 77,
                'migration' => '2025_04_25_120434_create_ar_terms_and_conditions_table',
            ),
            77 => 
            array (
                'batch' => 0,
                'id' => 78,
                'migration' => '2025_04_25_120434_create_ar_test_table',
            ),
            78 => 
            array (
                'batch' => 0,
                'id' => 79,
                'migration' => '2025_04_25_120434_create_ar_transaction_types_table',
            ),
            79 => 
            array (
                'batch' => 0,
                'id' => 80,
                'migration' => '2025_04_25_120434_create_ar_type_parcel_table',
            ),
            80 => 
            array (
                'batch' => 0,
                'id' => 81,
                'migration' => '2025_04_25_120434_create_ar_users_table',
            ),
            81 => 
            array (
                'batch' => 0,
                'id' => 82,
                'migration' => '2025_04_25_120434_create_ar_voip_table',
            ),
            82 => 
            array (
                'batch' => 0,
                'id' => 83,
                'migration' => '2025_04_25_120434_create_ar_wait_service_table',
            ),
            83 => 
            array (
                'batch' => 0,
                'id' => 84,
                'migration' => '2025_04_25_120434_create_ar_wallet_table',
            ),
            84 => 
            array (
                'batch' => 0,
                'id' => 85,
                'migration' => '2025_04_25_120434_create_ar_wallet_admin_table',
            ),
            85 => 
            array (
                'batch' => 0,
                'id' => 86,
                'migration' => '2025_04_25_120434_create_ar_wallet_agency_table',
            ),
            86 => 
            array (
                'batch' => 0,
                'id' => 87,
                'migration' => '2025_04_25_120434_create_ar_way_type_table',
            ),
            87 => 
            array (
                'batch' => 0,
                'id' => 88,
                'migration' => '2025_04_25_120434_create_ar_worker_price_table',
            ),
            88 => 
            array (
                'batch' => 0,
                'id' => 89,
                'migration' => '2025_04_25_120434_create_categories_table',
            ),
            89 => 
            array (
                'batch' => 0,
                'id' => 90,
                'migration' => '2025_04_25_120434_create_failed_jobs_table',
            ),
            90 => 
            array (
                'batch' => 0,
                'id' => 91,
                'migration' => '2025_04_25_120434_create_fields_table',
            ),
            91 => 
            array (
                'batch' => 0,
                'id' => 92,
                'migration' => '2025_04_25_120434_create_jobs_table',
            ),
            92 => 
            array (
                'batch' => 0,
                'id' => 93,
                'migration' => '2025_04_25_120434_create_languages_table',
            ),
            93 => 
            array (
                'batch' => 0,
                'id' => 94,
                'migration' => '2025_04_25_120434_create_password_reset_tokens_table',
            ),
            94 => 
            array (
                'batch' => 0,
                'id' => 95,
                'migration' => '2025_04_25_120434_create_personal_access_tokens_table',
            ),
            95 => 
            array (
                'batch' => 0,
                'id' => 96,
                'migration' => '2025_04_25_120434_create_relation_conditions_table',
            ),
            96 => 
            array (
                'batch' => 0,
                'id' => 97,
                'migration' => '2025_04_25_120434_create_relations_table',
            ),
            97 => 
            array (
                'batch' => 0,
                'id' => 98,
                'migration' => '2025_04_25_120434_create_reports_table',
            ),
            98 => 
            array (
                'batch' => 0,
                'id' => 99,
                'migration' => '2025_04_25_120434_create_routes_table',
            ),
            99 => 
            array (
                'batch' => 0,
                'id' => 100,
                'migration' => '2025_04_25_120434_create_settings_table',
            ),
            100 => 
            array (
                'batch' => 0,
                'id' => 101,
                'migration' => '2025_04_25_120434_create_trashes_table',
            ),
            101 => 
            array (
                'batch' => 0,
                'id' => 102,
                'migration' => '2025_04_25_120434_create_user_accesses_table',
            ),
            102 => 
            array (
                'batch' => 0,
                'id' => 103,
                'migration' => '2025_04_25_120434_create_user_roles_table',
            ),
            103 => 
            array (
                'batch' => 0,
                'id' => 104,
                'migration' => '2025_04_25_120434_create_users_table',
            ),
            104 => 
            array (
                'batch' => 0,
                'id' => 105,
                'migration' => '2025_04_25_120434_create_visits_table',
            ),
        ));
        
        
    }
}
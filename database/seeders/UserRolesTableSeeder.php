<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class UserRolesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('user_roles')->delete();
        
        \DB::table('user_roles')->insert(array (
            0 => 
            array (
                '	logout_route_id' => NULL,
                'category_slug' => 'users',
                'created_at' => '2023-12-30 04:56:56',
                'id' => 1,
                'landing_route_id' => NULL,
                'login_route_id' => NULL,
                'logout_route_id' => NULL,
                'password_field_id' => NULL,
                'title' => 'کاربر',
                'updated_at' => '2023-12-30 04:56:56',
                'username_field_id' => 140,
            ),
            1 => 
            array (
                '	logout_route_id' => NULL,
                'category_slug' => 'drivers',
                'created_at' => '2024-01-09 04:00:44',
                'id' => 2,
                'landing_route_id' => NULL,
                'login_route_id' => 1,
                'logout_route_id' => NULL,
                'password_field_id' => NULL,
                'title' => 'راننده',
                'updated_at' => '2024-01-09 04:00:56',
                'username_field_id' => 163,
            ),
        ));
        
        
    }
}
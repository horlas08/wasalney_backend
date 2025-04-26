<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('users')->delete();
        
        \DB::table('users')->insert(array (
            0 => 
            array (
                'category_slug' => 'users',
                'created_at' => '2025-03-15 08:14:28',
                'deleted_at' => NULL,
                'id' => 1,
                'password' => '$2y$10$QhLzJFFUAvQcPOwzZEYYXuSgiU2xcufKLeKg/60jPRxwH375jqn8G',
                'record_id' => 1,
                'role_id' => 1,
                'updated_at' => '2025-03-15 08:14:28',
                'username' => '09104992005',
            ),
            1 => 
            array (
                'category_slug' => 'drivers',
                'created_at' => '2025-03-15 08:18:04',
                'deleted_at' => NULL,
                'id' => 2,
                'password' => '$2y$10$7fTahxj7XcfdOFkma80RZuRO37p8dPKRY5gbs6jBC3bCuz64OqalG',
                'record_id' => 1,
                'role_id' => 2,
                'updated_at' => '2025-03-15 08:18:04',
                'username' => '9104992005',
            ),
            2 => 
            array (
                'category_slug' => 'users',
                'created_at' => '2025-03-15 08:45:37',
                'deleted_at' => NULL,
                'id' => 3,
                'password' => '$2y$10$00YXabBXgYH6Ml2s9P2p0O5qC0c35dsy8kByYKN2LwOZuNZ4A3wlK',
                'record_id' => 2,
                'role_id' => 1,
                'updated_at' => '2025-03-15 08:45:37',
                'username' => '09900733439',
            ),
            3 => 
            array (
                'category_slug' => 'users',
                'created_at' => '2025-03-15 09:39:18',
                'deleted_at' => NULL,
                'id' => 4,
                'password' => '$2y$10$NU29x.ylLTzaCCvlhssJDei6DOpF1BiGnTR/QIikpyQtkqB6v1nfW',
                'record_id' => 3,
                'role_id' => 1,
                'updated_at' => '2025-03-15 09:39:18',
                'username' => '07729633336',
            ),
            4 => 
            array (
                'category_slug' => 'drivers',
                'created_at' => '2025-03-15 23:56:40',
                'deleted_at' => NULL,
                'id' => 5,
                'password' => '$2y$10$tZ9eTrlJJQQkT5LOPii1hOLhg5tWYdk0CQh6LDfQ5KA2sw9/xxtEC',
                'record_id' => 2,
                'role_id' => 2,
                'updated_at' => '2025-03-15 23:56:40',
                'username' => '0772963336',
            ),
            5 => 
            array (
                'category_slug' => 'drivers',
                'created_at' => '2025-03-17 10:06:05',
                'deleted_at' => NULL,
                'id' => 6,
                'password' => '$2y$10$RIYbb494CZ3t1UuU6FQM0.SMeg1vP88cL6BX8fX9BUWZ5YsshCzD6',
                'record_id' => 3,
                'role_id' => 2,
                'updated_at' => '2025-03-17 10:06:05',
                'username' => '07729633336',
            ),
            6 => 
            array (
                'category_slug' => 'drivers',
                'created_at' => '2025-03-17 10:07:38',
                'deleted_at' => NULL,
                'id' => 7,
                'password' => '$2y$10$Dvl2Ka29l9cXqH41ooziKuY8.dKMUJejoIF.J1wmZkhrr3pOtQa5O',
                'record_id' => 4,
                'role_id' => 2,
                'updated_at' => '2025-03-17 10:07:38',
                'username' => '07729366663',
            ),
            7 => 
            array (
                'category_slug' => 'users',
                'created_at' => '2025-03-17 13:53:48',
                'deleted_at' => NULL,
                'id' => 8,
                'password' => '$2y$10$mMVdSprMH69j/kK8Sh49v.kuw8XBbCe8sKfB/w//mb1uhsCY7syVG',
                'record_id' => 4,
                'role_id' => 1,
                'updated_at' => '2025-03-17 13:53:48',
                'username' => '07805754917',
            ),
            8 => 
            array (
                'category_slug' => 'users',
                'created_at' => '2025-03-17 14:16:12',
                'deleted_at' => NULL,
                'id' => 9,
                'password' => '$2y$10$8pHt2lk8f8oh8h28q.KdNeINIDxgx3HFIJxLainDROD1V36Gszc8e',
                'record_id' => 5,
                'role_id' => 1,
                'updated_at' => '2025-03-17 14:16:12',
                'username' => '07723119465',
            ),
            9 => 
            array (
                'category_slug' => 'drivers',
                'created_at' => '2025-03-18 05:48:32',
                'deleted_at' => NULL,
                'id' => 10,
                'password' => '$2y$10$CIn12gGgBW9tjCjXzQq1YOLRAkRXyIsIAtXkFzdOtoLDuvCloyMgq',
                'record_id' => 5,
                'role_id' => 2,
                'updated_at' => '2025-03-18 05:48:32',
                'username' => '09900733439',
            ),
        ));
        
        
    }
}
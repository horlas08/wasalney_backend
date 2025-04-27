<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class AdminsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {


        \DB::table('admins')->delete();

        \DB::table('admins')->insert(array (
            0 =>
            array (
                'created_at' => '2022-01-12 02:34:08',
                'id' => 1,
                'level' => 1,
                'name' => 'DunCode',
                'notif_token' => 'dd962285-72c2-4812-803d-7c44dae7dfae',
                'number' => '123',
                'password' => '$2y$10$zFtTWN4l1JqrnPvCHyIzrep/n3jKD2y6dQde8xN40Y/eFpM5sZwKy',
                'remember_token' => NULL,
                'updated_at' => '2024-10-26 08:20:06',
                'username' => 'admin',
            ),
            1 =>
            array (
                'created_at' => '2024-05-07 13:03:47',
                'id' => 4,
                'level' => 2,
                'name' => 'ajorlo',
                'notif_token' => '5ea88ac2-90e4-4ecd-80f8-4b3abfc363f8',
                'number' => NULL,
                'password' => '$2y$10$yQIdmfPaDH9uGNxw8UGwne.3OsTcELCj9Gu/64YhGcwPpZuwq3nca',
                'remember_token' => NULL,
                'updated_at' => '2024-05-07 13:05:53',
                'username' => 'ajorlo',
            ),

            2 =>
            array (
                'created_at' => '2024-10-26 08:34:07',
                'id' => 7,
                'level' => 2,
                'name' => 'sajad',
                'notif_token' => '4f859b06-314b-456d-bef9-f11cd69db7b8',
                'number' => NULL,
                'password' => '$2y$10$309nfPN2EGEZybBiNf7H2OEhpVzuK/x90XwkRNpSFQ6EipYDOtLxC',
                'remember_token' => NULL,
                'updated_at' => '2024-10-26 08:34:07',
                'username' => 'sajad',
            ),
            3 =>
            array (
                'created_at' => '2024-10-27 13:57:55',
                'id' => 8,
                'level' => 3,
                'name' => 'admin okay',
                'notif_token' => '51c4d110-dc44-4c47-aa5b-a13262ac8225',
                'number' => NULL,
                'password' => '$2y$10$aPSJc56pW0K3bJWuavnhJe/D/gGoo4yuB6PdZF0LyI.lORjBC11Zy',
                'remember_token' => NULL,
                'updated_at' => '2024-10-27 14:09:14',
                'username' => 'adminokay',
            ),
            4 =>
            array (
                'created_at' => '2024-10-30 15:05:47',
                'id' => 9,
                'level' => 4,
                'name' => 'ali',
                'notif_token' => 'ab66d094-9cbc-4ffa-9a3d-2a69069a56ac',
                'number' => NULL,
                'password' => '$2y$10$h41WYhweVinC6BLNcmg9TOOZfvnsl2mdwAZR03YIlDANB/aLbCZhi',
                'remember_token' => NULL,
                'updated_at' => '2024-10-30 15:05:47',
                'username' => 'ali',
            ),
            5 =>
            array (
                'created_at' => '2024-10-30 16:17:14',
                'id' => 11,
                'level' => 4,
                'name' => 'adminmesya',
                'notif_token' => 'ed2fec24-879d-4ade-bceb-ccf8646a6df5',
                'number' => NULL,
                'password' => '$2y$10$sdgmgctNH9LLx3zRyyenU.IsWF1Sp008AUJ5n3tbfKlG5mIm1w7wW',
                'remember_token' => NULL,
                'updated_at' => '2024-10-30 16:17:14',
                'username' => 'adminmesya',
            ),
            6 =>
            array (
                'created_at' => '2024-10-30 16:23:14',
                'id' => 12,
                'level' => 4,
                'name' => 'Ahmad',
                'notif_token' => 'aeb72824-1223-4f33-87db-c4981cb3f96b',
                'number' => NULL,
                'password' => '$2y$10$rrGOivtuYbLfISfGO5zuAu.h565ya6t/FAiWkeP6/oB6DiPKT5tTG',
                'remember_token' => NULL,
                'updated_at' => '2024-10-30 16:23:14',
                'username' => 'Ahmad',
            ),
            7 =>
            array (
                'created_at' => '2024-10-30 16:37:48',
                'id' => 13,
                'level' => 4,
                'name' => 'Taha7y',
                'notif_token' => '40760a2e-39b5-4698-b444-4b65e1f6b732',
                'number' => NULL,
                'password' => '$2y$10$Hq/FvEBbh74XpwA4FhIBa.fdHwIBsLe7ZYUPelR3nkdmJYveAYOo2',
                'remember_token' => NULL,
                'updated_at' => '2024-10-30 16:37:48',
                'username' => 'Taha7y',
            ),
            8 =>
            array (
                'created_at' => '2024-10-30 16:44:16',
                'id' => 15,
                'level' => 4,
                'name' => 'Mahmoud.F.Mahmoud',
                'notif_token' => '8d48ab76-9dd1-477c-a78d-b7d16e9cda63',
                'number' => NULL,
                'password' => '$2y$10$41iNkGDB.LzWLN7S.D/kTuYrbkGBF.W49J3aUDRv6OgRIqM5HSqj6',
                'remember_token' => NULL,
                'updated_at' => '2024-10-30 16:44:16',
                'username' => 'Mahmoud.F.Mahmoud',
            ),
            9 =>
            array (
                'created_at' => '2024-11-19 14:28:05',
                'id' => 17,
                'level' => 4,
                'name' => 'yazin',
                'notif_token' => 'd1d4affa-debf-465a-9550-2458aa2d63da',
                'number' => NULL,
                'password' => '$2y$10$MwEjDXSe.noFRSO9672Be.Uia/IYVnWh7F9zv08EHfqIVuaThZw4C',
                'remember_token' => NULL,
                'updated_at' => '2024-11-19 14:28:05',
                'username' => 'yazin',
            ),
            10 =>
            array (
                'created_at' => '2025-01-14 13:30:59',
                'id' => 22,
                'level' => 4,
                'name' => 'omar.com',
                'notif_token' => 'd1327096-b3f7-4772-a0b8-1715fe3b62bb',
                'number' => NULL,
                'password' => '$2y$10$yO7CIomroxsnadZcFCwlRO/RZfuYy.GiijfMuOZyzHwKWCmILgTR.',
                'remember_token' => NULL,
                'updated_at' => '2025-01-14 13:30:59',
                'username' => 'omar.com',
            ),
        ));


    }
}
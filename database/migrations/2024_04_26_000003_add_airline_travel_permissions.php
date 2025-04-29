<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up()
    {
        // Add airline-travel permissions
        DB::table('permissions')->insert([
            [
                'name' => 'airline-travel',
                'title' => 'Airline Travel Management',
                'created_at' => now(),
                'updated_at' => now()
            ]
        ]);

        // Get the permission ID
        $permissionId = DB::table('permissions')->where('name', 'airline-travel')->first()->id;

        // Add permission actions
        DB::table('permission_actions')->insert([
            [
                'permission_id' => $permissionId,
                'name' => 'show',
                'title' => 'View Airline Travel Requests',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'permission_id' => $permissionId,
                'name' => 'edit',
                'title' => 'Update Airline Travel Requests',
                'created_at' => now(),
                'updated_at' => now()
            ]
        ]);
    }

    public function down()
    {
        // Get the permission ID
        $permission = DB::table('permissions')->where('name', 'airline-travel')->first();
        if ($permission) {
            // Delete permission actions
            DB::table('permission_actions')->where('permission_id', $permission->id)->delete();
            // Delete permission
            DB::table('permissions')->where('id', $permission->id)->delete();
        }
    }
};

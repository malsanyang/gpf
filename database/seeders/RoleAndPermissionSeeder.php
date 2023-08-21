<?php

namespace Database\Seeders;

use App\Library\Auth\LocalPermission;
use App\Library\Auth\LocalRole;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleAndPermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Permission::firstOrCreate(['name' => LocalPermission::CAN_CREATE_USERS]);
        Permission::firstOrCreate(['name' => LocalPermission::CAN_UPDATE_USERS]);
        Permission::firstOrCreate(['name' => LocalPermission::CAN_DELETE_USERS]);

        $role = Role::firstOrCreate(['name' => LocalRole::ROLE_SUPER_ADMIN]);

        $role->givePermissionTo([
            LocalPermission::CAN_CREATE_USERS,
            LocalPermission::CAN_UPDATE_USERS,
            LocalPermission::CAN_DELETE_USERS,
        ]);
    }
}

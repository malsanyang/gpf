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
        Permission::firstOrCreate(['name' => LocalPermission::CAN_VIEW_RECORD]);
        Permission::firstOrCreate(['name' => LocalPermission::CAN_CREATE_RECORD]);
        Permission::firstOrCreate(['name' => LocalPermission::CAN_UPDATE_RECORD]);
        Permission::firstOrCreate(['name' => LocalPermission::CAN_DELETE_RECORD]);
        Permission::firstOrCreate(['name' => LocalPermission::CAN_ADD_INVESTIGATOR_REPORT]);
        Permission::firstOrCreate(['name' => LocalPermission::CAN_ADD_PROSECUTION_REPORT]);

        $role = Role::firstOrCreate(['name' => LocalRole::ROLE_POLICE_OFFICER]);

        $role->givePermissionTo([
            LocalPermission::CAN_VIEW_RECORD,
            LocalPermission::CAN_CREATE_RECORD,
            LocalPermission::CAN_UPDATE_RECORD,
            LocalPermission::CAN_DELETE_RECORD,
            LocalPermission::CAN_ADD_INVESTIGATOR_REPORT,
            LocalPermission::CAN_ADD_PROSECUTION_REPORT,
        ]);

        $role = Role::firstOrCreate(['name' => LocalRole::ROLE_INVESTIGATOR]);

        $role->givePermissionTo([
            LocalPermission::CAN_VIEW_RECORD,
            LocalPermission::CAN_ADD_INVESTIGATOR_REPORT,
        ]);

        $role = Role::firstOrCreate(['name' => LocalRole::ROLE_PROSECUTOR]);

        $role->givePermissionTo([
            LocalPermission::CAN_VIEW_RECORD,
            LocalPermission::CAN_ADD_PROSECUTION_REPORT,
        ]);
    }
}

<?php

namespace Modules\RolePermission\Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\RolePermission\Models\Permission;
use Modules\RolePermission\Models\Role;
use Spatie\Permission\Models\Permission as SpatiePermission;
use Spatie\Permission\Models\Role as SpatieRole;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach (Permission::$permissions as $permission) {
            SpatiePermission::findOrCreate($permission);
        }

        foreach (Role::$roles as $name => $permissions) {
            SpatieRole::findOrCreate($name)->givePermissionTo($permissions);
        }
    }
}

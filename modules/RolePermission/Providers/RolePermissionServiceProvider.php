<?php

namespace Modules\RolePermission\Providers;

use Database\Seeders\DatabaseSeeder;
use Illuminate\Support\ServiceProvider;
use Modules\RolePermission\Database\Seeders\RolePermissionSeeder;

class RolePermissionServiceProvider extends ServiceProvider
{

    public function register()
    {
        $this->loadMigrationsFrom(__DIR__ . '/../Database/Migrations');

        $this->loadRoutesFrom(__DIR__ . '/../Routes/role_permission_routes.php');

        $this->mergeConfigFrom(__DIR__ . '/../Config/permission.php', 'permission');

        DatabaseSeeder::$seeders[1] = RolePermissionSeeder::class;
    }

}

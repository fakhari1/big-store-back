<?php

namespace Modules\RolePermission\Providers;

use Illuminate\Support\ServiceProvider;

class RolePermissionServiceProvider extends ServiceProvider
{

    public function register()
    {
        $this->loadMigrationsFrom(__DIR__ . '/../Database/Migrations');

        $this->loadRoutesFrom(__DIR__ . '/../Routes/role_permission_routes.php');

        $this->mergeConfigFrom(__DIR__ . '/../Config/permission.php', 'permission');
    }

}

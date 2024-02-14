<?php

namespace Modules\User\Providers;

use Database\Seeders\DatabaseSeeder;
use Illuminate\Support\ServiceProvider;
use Modules\User\Database\Seeders\AddressSeeder;
use Modules\User\Database\Seeders\UserSeeder;
use Modules\User\Database\Seeders\VendorSeeder;

class UserServiceProvider extends ServiceProvider
{

    public function register()
    {
        $this->loadMigrationsFrom(__DIR__ . '/../Database/Migrations');
        $this->loadRoutesFrom(__DIR__ . '/../Routes/user_routes.php');

        DatabaseSeeder::$seeders[1] = UserSeeder::class;
        DatabaseSeeder::$seeders[8] = AddressSeeder::class;
        DatabaseSeeder::$seeders[9] = VendorSeeder::class;
    }

}

<?php

namespace Modules\Order\Providers;
use Database\Seeders\DatabaseSeeder;
use Illuminate\Support\ServiceProvider;
use Modules\Order\Database\Seeders\OrderSeeder;

class OrderServiceProvider extends ServiceProvider
{

    public function register()
    {
        $this->loadMigrationsFrom(__DIR__ . '/../Database/Migrations');
        $this->loadRoutesFrom(__DIR__ . '/../Routes/order_routes.php');

        DatabaseSeeder::$seeders[23] = OrderSeeder::class;
    }

}

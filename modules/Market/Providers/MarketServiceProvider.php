<?php

namespace Modules\Market\Providers;

use Database\Seeders\DatabaseSeeder;
use Illuminate\Support\ServiceProvider;
use Modules\Market\Database\Seeds\BrandSeeder;
use Modules\Market\Database\Seeds\DeliveryMethodSeeder;
use Modules\Market\Database\Seeds\ProductSeeder;


class MarketServiceProvider extends ServiceProvider
{

    public function register()
    {
        $this->loadMigrationsFrom(__DIR__ . '/../Database/Migrations');
        $this->loadRoutesFrom(__DIR__ . '/../Routes/market_routes.php');

        DatabaseSeeder::$seeders[15] = BrandSeeder::class;
        DatabaseSeeder::$seeders[17] = ProductSeeder::class;
        DatabaseSeeder::$seeders[22] = DeliveryMethodSeeder::class;


    }

}

<?php

namespace Modules\Market\Providers;

use Illuminate\Support\ServiceProvider;

class MarketServiceProvider extends ServiceProvider
{

    public function register()
    {
        $this->loadMigrationsFrom(__DIR__ . '/../Database/Migrations');
        $this->loadRoutesFrom(__DIR__ . '/../Routes/market_routes.php');
    }

}

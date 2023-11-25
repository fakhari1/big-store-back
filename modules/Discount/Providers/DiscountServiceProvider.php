<?php

namespace Modules\Discount\Providers;

use Illuminate\Support\ServiceProvider;

class DiscountServiceProvider extends ServiceProvider
{

    public function register()
    {
        $this->loadMigrationsFrom(__DIR__ . '/../Database/Migrations');
        $this->loadRoutesFrom(__DIR__ . '/../Routes/discount_routes.php');
    }

}

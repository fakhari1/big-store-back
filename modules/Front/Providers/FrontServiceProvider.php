<?php

namespace Modules\Front\Providers;

use Illuminate\Support\ServiceProvider;


class FrontServiceProvider extends ServiceProvider
{

    public function register()
    {
//        $this->loadMigrationsFrom(__DIR__ . '/../Database/Migrations');
        $this->loadRoutesFrom(__DIR__ . '/../Routes/front_routes.php');
        $this->loadViewsFrom(__DIR__ . '/../Resources/Views', 'Front');
    }

}

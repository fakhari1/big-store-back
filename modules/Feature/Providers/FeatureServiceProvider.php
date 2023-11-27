<?php

namespace Modules\Feature\Providers;

use Illuminate\Support\ServiceProvider;

class FeatureServiceProvider extends ServiceProvider
{

    public function register()
    {
        $this->loadMigrationsFrom(__DIR__ . '/../Database/Migrations');
//        $this->loadRoutesFrom(__DIR__ . '/../Routes/feature_routes.php');
    }

}

<?php

namespace Modules\Comment\Providers;

use Illuminate\Support\ServiceProvider;

class ContentServiceProvider extends ServiceProvider
{

    public function register()
    {
        $this->loadMigrationsFrom(__DIR__ . '/../Database/Migrations');
        $this->loadRoutesFrom(__DIR__ . '/../Routes/content_routes.php');
    }

}

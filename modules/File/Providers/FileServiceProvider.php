<?php

namespace Modules\File\Providers;

use Illuminate\Support\ServiceProvider;

class FileServiceProvider extends ServiceProvider
{

    /**
     * Register services
     */

    public function register()
    {
        $this->loadMigrationsFrom(__DIR__ . '/../Database/Migrations/');
        $this->loadRoutesFrom(__DIR__ . '/../Routes/file_routes.php');
    }

    /**
     * Bootstrap services
     */

    public function boot()
    {

    }

}

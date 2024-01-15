<?php

namespace Modules\File\Providers;

use Database\Seeders\DatabaseSeeder;
use Illuminate\Support\ServiceProvider;
use Modules\File\Database\Seeders\FileSeeder;

class FileServiceProvider extends ServiceProvider
{

    /**
     * Register services
     */

    public function register()
    {
        $this->loadMigrationsFrom(__DIR__ . '/../Database/Migrations/');
        $this->loadRoutesFrom(__DIR__ . '/../Routes/file_routes.php');

        DatabaseSeeder::$seeders[3] = FileSeeder::class;
    }

    /**
     * Bootstrap services
     */

    public function boot()
    {

    }

}

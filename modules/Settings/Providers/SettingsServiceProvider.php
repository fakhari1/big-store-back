<?php

namespace Modules\Settings\Providers;

use Database\Seeders\DatabaseSeeder;
use Illuminate\Support\ServiceProvider;
use Modules\Settings\Database\Seeders\GeneralSettingsSeeder;

class SettingsServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->loadMigrationsFrom(__DIR__ . '/../Database/Migrations');
        $this->loadRoutesFrom(__DIR__ . '/../Routes/settings_routes.php');
        $this->mergeConfigFrom(module_path('Settings', 'Configs\\settings.php'), 'settings');

        DatabaseSeeder::$seeders[7] = GeneralSettingsSeeder::class;
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}

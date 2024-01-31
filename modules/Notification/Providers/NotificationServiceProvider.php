<?php

namespace Modules\Notification\Providers;

use Database\Seeders\DatabaseSeeder;
use Illuminate\Support\ServiceProvider;
use Modules\Notification\Database\Seeders\SmsSeeder;

class NotificationServiceProvider extends ServiceProvider
{

    public function register()
    {
        $this->loadMigrationsFrom(__DIR__ . '/../Database/Migrations');
        $this->loadRoutesFrom(__DIR__ . '/../Routes/notification_routes.php');

        DatabaseSeeder::$seeders[6] = SmsSeeder::class;
    }

}

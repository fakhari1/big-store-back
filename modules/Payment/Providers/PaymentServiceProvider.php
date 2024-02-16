<?php

namespace Modules\Payment\Providers;

use Database\Seeders\DatabaseSeeder;
use Illuminate\Support\ServiceProvider;
use Modules\Payment\Database\Seeds\PaymentSeeder;


class PaymentServiceProvider extends ServiceProvider
{

    public function register()
    {
        $this->loadMigrationsFrom(__DIR__ . '/../Database/Migrations');
        $this->loadRoutesFrom(__DIR__ . '/../Routes/payment_routes.php');

        DatabaseSeeder::$seeders[21] = PaymentSeeder::class;
    }

}

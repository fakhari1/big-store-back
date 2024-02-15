<?php

namespace Modules\Discount\Providers;

use Database\Seeders\DatabaseSeeder;
use Illuminate\Support\ServiceProvider;
use Modules\Discount\Database\Seeds\AmazingDiscountSeeder;
use Modules\Discount\Database\Seeds\CommonDiscountSeeder;
use Modules\Discount\Database\Seeds\CouponDiscountSeeder;

class DiscountServiceProvider extends ServiceProvider
{

    public function register()
    {
        $this->loadMigrationsFrom(__DIR__ . '/../Database/Migrations');
        $this->loadRoutesFrom(__DIR__ . '/../Routes/discount_routes.php');

        DatabaseSeeder::$seeders[18] = CouponDiscountSeeder::class;
        DatabaseSeeder::$seeders[19] = AmazingDiscountSeeder::class;
        DatabaseSeeder::$seeders[20] = CommonDiscountSeeder::class;


    }

}

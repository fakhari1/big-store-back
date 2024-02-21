<?php

namespace Modules\Vendor\Providers;

use Illuminate\Support\ServiceProvider;


class VendorServiceProvider extends ServiceProvider
{

    public function register()
    {
        $this->loadMigrationsFrom(__DIR__ . '/../Database/Migrations');
        $this->loadRoutesFrom(__DIR__ . '/../Routes/vendor_routes.php');

    }

}

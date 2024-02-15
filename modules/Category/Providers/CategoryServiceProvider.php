<?php

namespace Modules\Category\Providers;

use Database\Seeders\DatabaseSeeder;
use Illuminate\Support\ServiceProvider;
use Modules\Category\Database\Seeders\PostCategorySeeder;
use Modules\Category\Database\Seeders\ProductCategorySeeder;

class CategoryServiceProvider extends ServiceProvider
{

    public function register()
    {
        $this->loadMigrationsFrom(__DIR__ . '/../Database/Migrations/');
        $this->loadRoutesFrom(__DIR__ . '/../Routes/category_routes.php');

        DatabaseSeeder::$seeders[2] = PostCategorySeeder::class;
        DatabaseSeeder::$seeders[16] = ProductCategorySeeder::class;

    }

}

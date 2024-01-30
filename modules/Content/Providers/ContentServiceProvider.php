<?php

namespace Modules\Content\Providers;

use Database\Seeders\DatabaseSeeder;
use Illuminate\Support\ServiceProvider;
use Modules\Content\Database\Seeders\CommentSeeder;
use Modules\Content\Database\Seeders\PostSeeder;

class ContentServiceProvider extends ServiceProvider
{

    public function register()
    {
        $this->loadMigrationsFrom(__DIR__ . '/../Database/Migrations');
        $this->loadRoutesFrom(__DIR__ . '/../Routes/content_routes.php');

        DatabaseSeeder::$seeders[4] = PostSeeder::class;
        DatabaseSeeder::$seeders[5] = CommentSeeder::class;
    }

}

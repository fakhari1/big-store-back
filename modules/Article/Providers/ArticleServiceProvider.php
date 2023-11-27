<?php

namespace Modules\Article\Providers;

use Illuminate\Support\ServiceProvider;

class ArticleServiceProvider extends ServiceProvider
{

    public function register()
    {
        $this->loadMigrationsFrom(__DIR__ . '/../Database/Migrations');
//        $this->loadRoutesFrom(__DIR__ . '/../Routes/article_routes.php');
    }

}

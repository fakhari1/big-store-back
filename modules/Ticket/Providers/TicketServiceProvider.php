<?php

namespace Modules\Ticket\Providers;

use Illuminate\Support\ServiceProvider;

class TicketServiceProvider extends ServiceProvider
{

    public function register()
    {
        $this->loadMigrationsFrom(__DIR__ . '/../Database/Migrations');
        $this->loadRoutesFrom(__DIR__ . '/../Routes/ticket_routes.php');
    }

}

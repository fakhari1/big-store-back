<?php


use Illuminate\Support\Facades\Route;
use Modules\Ticket\Http\Controllers\TicketController;

Route::middleware(['api'])->prefix('api')->group(function () {
    Route::prefix('admin')->group(function () {
        Route::prefix('ticket')->group(function () {

            Route::get('new-tickets', [TicketController::class, 'getNewTickets']);
            Route::get('open-tickets', [TicketController::class, 'getOpenTickets']);
            Route::get('closed-tickets', [TicketController::class, 'getClosedTickets']);
            Route::get('{ticket}', [TicketController::class, 'getTicket']);

        });
    });
});

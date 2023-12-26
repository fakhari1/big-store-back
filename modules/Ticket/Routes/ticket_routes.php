<?php


use Illuminate\Support\Facades\Route;
use Modules\Ticket\Http\Controllers\TicketController;

Route::middleware(['api'])->prefix('api')->group(function () {
    Route::prefix('admin')->group(function () {
        Route::prefix('ticket')->group(function () {

            Route::get('new-tickets', [TicketController::class, 'getNewTickets']);
            Route::get('open-tickets', [TicketController::class, 'getOpenTickets']);
            Route::get('closed-tickets', [TicketController::class, 'getClosed']);
            Route::get('{ticket}', [TicketController::class, 'getTicket']);
            Route::get('online', [TicketController::class, 'getOnlinePayments']);
            Route::get('offline', [TicketController::class, 'getOfflinePayments']);
            Route::get('on-delivered', [TicketController::class, 'getOnDeliveredPayments']);
            Route::patch('{payment}', [TicketController::class, 'update']);

        });
    });
});

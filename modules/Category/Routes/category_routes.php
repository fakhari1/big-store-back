<?php

use Illuminate\Support\Facades\Route;
use Modules\Category\Http\Controllers\ProductCategoryController;
use Modules\Category\Http\Controllers\PostCategoryController;
use Modules\Category\Http\Controllers\TicketCategoryController;
use Modules\Category\Http\Controllers\MenuController;

Route::middleware(['api'])->prefix('api')->group(function () {

    Route::prefix('admin')->group(function () {

        Route::prefix('categories')->group(function () {

            Route::prefix('market')->group(function () {
                Route::get('/', [ProductCategoryController::class, 'index']);
                Route::post('/', [ProductCategoryController::class, 'store']);
                Route::get('{product_category}', [ProductCategoryController::class, 'show']);
                Route::patch('{product_category}', [ProductCategoryController::class, 'update']);
                Route::delete('{product_category}', [ProductCategoryController::class, 'destroy']);
            });

            Route::prefix('content')->group(function () {
                Route::get('/', [PostCategoryController::class, 'index']);
                Route::get('create', [PostCategoryController::class, 'create']);
                Route::get('{post_category}', [PostCategoryController::class, 'show']);
                Route::post('/', [PostCategoryController::class, 'store']);
                Route::patch('{post_category}', [PostCategoryController::class, 'update']);
                Route::patch('{post_category}/update-status', [PostCategoryController::class, 'updateStatus']);
                Route::delete('{post_category}', [PostCategoryController::class, 'destroy']);
            });

            Route::prefix('menus')->group(function () {
                Route::get('/', [MenuController::class, 'index']);
                Route::get('create', [MenuController::class, 'create']);
                Route::get('{menu}', [MenuController::class, 'show']);
                Route::post('/', [MenuController::class, 'store']);
                Route::patch('{menu}', [MenuController::class, 'update']);
                Route::delete('{menu}', [MenuController::class, 'destroy']);
                Route::patch('{menu}/update-status', [MenuController::class, 'updateStatus']);
            });

            Route::prefix('tickets')->group(function () {
                Route::get('/', [TicketCategoryController::class, 'index']);
                Route::get('create', [TicketCategoryController::class, 'create']);
                Route::get('{ticket_category}', [TicketCategoryController::class, 'show']);
                Route::post('/', [TicketCategoryController::class, 'store']);
                Route::patch('{ticket_category}', [TicketCategoryController::class, 'update']);
                Route::patch('{ticket_category}/update-status', [TicketCategoryController::class, 'updateStatus']);
                Route::delete('{ticket_category}', [TicketCategoryController::class, 'destroy']);
            });
        });
    });
});

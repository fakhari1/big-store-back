<?php

use Illuminate\Support\Facades\Route;
use Modules\Front\Http\Controllers\FrontController;

            Route::prefix('product')->group(function () {
                Route::get('/', [FrontController::class, 'index']);
                Route::post('/', [FrontController::class, 'store']);
                Route::get('{product}', [FrontController::class, 'show']);
                Route::patch('{product}', [FrontController::class, 'update']);
                Route::delete('{product}', [FrontController::class, 'destroy']);
            });


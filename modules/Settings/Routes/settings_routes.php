<?php

use Illuminate\Support\Facades\Route;
use Modules\Settings\Http\Controllers\SettingsController;

Route::middleware(['api'])->prefix('api')->group(function () {

    Route::prefix('admin')->group(function () {

        Route::prefix('settings')->group(function () {

            Route::get('/', [SettingsController::class, 'index']);
            Route::get('create', [SettingsController::class, 'create']);
            Route::post('/', [SettingsController::class, 'store']);
            Route::patch('{settings}', [SettingsController::class, 'update']);
            Route::delete('{settings}', [SettingsController::class, 'destroy']);

        });
    });
});

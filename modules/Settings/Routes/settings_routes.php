<?php


use Illuminate\Support\Facades\Route;
use Modules\Settings\Http\Controllers\GeneralSettingsController;

Route::middleware(['api'])->prefix('api')->group(function () {
    Route::prefix('admin')->group(function () {
        Route::prefix('settings')->group(function () {
            Route::prefix('general')->group(function () {
                Route::get('/', [GeneralSettingsController::class, 'create'])->name('admin.settings.general.index');
                Route::post('create', [GeneralSettingsController::class, 'store'])->name('admin.settings.general.store');
                Route::patch('{settings}', [GeneralSettingsController::class, 'store'])->name('admin.settings.general.store');
            });
        });
    });
});

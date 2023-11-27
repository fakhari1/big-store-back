<?php


use Illuminate\Support\Facades\Route;

Route::middleware(['api'])->prefix('api')->group(function () {

    Route::prefix('admin')->group(function () {
        Route::prefix('market')->group(function () {

        });
    });
});

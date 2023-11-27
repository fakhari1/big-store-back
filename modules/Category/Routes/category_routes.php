<?php

use Illuminate\Support\Facades\Route;
use Modules\Category\Http\Controllers\ProductCategoryController;

Route::middleware(['api'])->prefix('api')->group(function () {

    Route::prefix('admin')->group(function () {
        Route::prefix('market')->group(function () {
            Route::prefix('categories')->group(function () {
                Route::get('/', [ProductCategoryController::class, 'index'])->name('admin.market.categories.index');
                Route::post('/', [ProductCategoryController::class, 'store'])->name('admin.market.categories.store');
                Route::get('{category}', [ProductCategoryController::class, 'show'])->name('admin.market.categories.show');
                Route::patch('{category}', [ProductCategoryController::class, 'update'])->name('admin.market.categories.update');
                Route::delete('{category}', [ProductCategoryController::class, 'destroy'])->name('admin.market.categories.delete');
            });
        });
    });

});

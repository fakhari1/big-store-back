<?php


use Illuminate\Support\Facades\Route;
use Modules\Market\Http\Controllers\BrandController;
use Modules\Market\Http\Controllers\ProductController;

Route::middleware(['api'])->prefix('api')->group(function () {

    Route::prefix('admin')->group(function () {
        Route::prefix('market')->group(function () {
            Route::prefix('brands')->group(function () {
                Route::get('/', [BrandController::class, 'index'])->name('admin.market.brands.index');
                Route::post('/', [BrandController::class, 'store'])->name('admin.market.brands.store');
                Route::get('{brand}', [BrandController::class, 'show'])->name('admin.market.brands.show');
                Route::patch('{brand}', [BrandController::class, 'update'])->name('admin.market.brands.update');
                Route::delete('{brand}', [BrandController::class, 'destroy'])->name('admin.market.brands.delete');
            });

            Route::prefix('products')->group(function () {
                Route::get('/', [ProductController::class, 'index'])->name('admin.market.products.index');
                Route::post('/', [ProductController::class, 'store'])->name('admin.market.products.store');
                Route::get('{product}', [ProductController::class, 'show'])->name('admin.market.products.show');
                Route::patch('{product}', [ProductController::class, 'update'])->name('admin.market.products.update');
                Route::delete('{product}', [ProductController::class, 'destroy'])->name('admin.market.products.delete');
            });
        });
    });
});

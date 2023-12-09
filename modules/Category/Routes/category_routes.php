<?php

use Illuminate\Support\Facades\Route;
use Modules\Category\Http\Controllers\ProductCategoryController;
use Modules\Content\Http\Controllers\PostCategoryController;

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

        Route::prefix('content')->group(function () {
            Route::prefix('categories')->group(function () {
                Route::get('/', [PostCategoryController::class, 'index'])->name('admin.content.categories.index');
                Route::get('create', [PostCategoryController::class, 'create'])->name('admin.content.categories.create');
                Route::get('{category}', [PostCategoryController::class, 'show'])->name('admin.content.categories.create');
                Route::post('/', [PostCategoryController::class, 'store'])->name('admin.content.categories.store');
                Route::patch('{category}', [PostCategoryController::class, 'update'])->name('admin.content.categories.update');
                Route::delete('{category}', [PostCategoryController::class, 'destroy'])->name('admin.content.categories.delete');
            });
        });
    });

});

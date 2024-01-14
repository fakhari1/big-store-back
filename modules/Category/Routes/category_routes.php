<?php

use Illuminate\Support\Facades\Route;
use Modules\Category\Http\Controllers\ProductCategoryController;
use Modules\Category\Http\Controllers\PostCategoryController;
use Modules\Category\Http\Controllers\MenuController;

Route::middleware(['api'])->prefix('api')->group(function () {

    Route::prefix('admin')->group(function () {

        Route::prefix('market')->group(function () {
            Route::prefix('categories')->group(function () {
                Route::get('/', [ProductCategoryController::class, 'index']);
                Route::post('/', [ProductCategoryController::class, 'store']);
                Route::get('{product_category}', [ProductCategoryController::class, 'show']);
                Route::patch('{product_category}', [ProductCategoryController::class, 'update']);
                Route::delete('{product_category}', [ProductCategoryController::class, 'destroy']);
            });
        });

        Route::prefix('content')->group(function () {
            Route::prefix('categories')->group(function () {
                Route::get('/', [PostCategoryController::class, 'index']);
                Route::get('create', [PostCategoryController::class, 'create']);
                Route::get('{post_category}', [PostCategoryController::class, 'show']);
                Route::post('/', [PostCategoryController::class, 'store']);
                Route::patch('{post_category}', [PostCategoryController::class, 'update']);
                Route::patch('{post_category}/update-status', [PostCategoryController::class, 'updateStatus']);
                Route::delete('{post_category}', [PostCategoryController::class, 'destroy']);


                Route::prefix('menus')->group(function () {
                    Route::get('/', [MenuController::class, 'index']);
                    Route::get('create', [MenuController::class, 'create']);
                    Route::get('{menu}', [MenuController::class, 'show']);
                    Route::post('/', [MenuController::class, 'store']);
                    Route::patch('{menu}', [MenuController::class, 'update']);
                    Route::delete('{menu}', [MenuController::class, 'destroy']);
                });
            });
        });
    });

});

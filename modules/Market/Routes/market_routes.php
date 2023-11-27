<?php


use Illuminate\Support\Facades\Route;
use Modules\Market\Http\Controllers\BrandController;
use Modules\Comment\Http\Controller\CommentController;

Route::middleware(['api'])->prefix('api')->group(function () {

    Route::prefix('admin')->group(function () {
        Route::prefix('market')->group(function () {
            Route::prefix('brands')->group(function () {
                Route::get('/', [BrandController::class, 'index'])->name('admin.market.brands.index');
                Route::post('/', [BrandController::class, 'store'])->name('admin.market.brands.store');
                Route::get('{category}', [BrandController::class, 'show'])->name('admin.market.brands.show');
                Route::patch('{category}', [BrandController::class, 'update'])->name('admin.market.brands.update');
                Route::delete('{category}', [BrandController::class, 'destroy'])->name('admin.market.brands.delete');
            });

            Route::prefix('comments')->group(function () {
                Route::get('/', [CommentController::class, 'index'])->name('admin.market.comments.index');
                Route::post('/', [CommentController::class, 'store'])->name('admin.market.comments.store');
                Route::get('{category}', [CommentController::class, 'show'])->name('admin.market.comments.show');
                Route::patch('{category}', [CommentController::class, 'update'])->name('admin.market.comments.update');
                Route::delete('{category}', [CommentController::class, 'destroy'])->name('admin.market.comments.delete');
            });
        });
    });
});

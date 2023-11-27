<?php

use Illuminate\Support\Facades\Route;
use Modules\Comment\Http\Controller\CommentController;

Route::middleware(['api'])->prefix('api')->group(function () {

    Route::prefix('admin')->group(function () {
        Route::prefix('market')->group(function () {

            Route::prefix('comments')->group(function () {
                Route::get('/', [CommentController::class, 'index'])->name('admin.market.comments.index');
                Route::post('/', [CommentController::class, 'store'])->name('admin.market.comments.store');
                Route::get('{comment}', [CommentController::class, 'show'])->name('admin.market.comments.show');
                Route::patch('{comment}', [CommentController::class, 'update'])->name('admin.market.comments.update');
                Route::delete('{comment}', [CommentController::class, 'destroy'])->name('admin.market.comments.delete');
            });

        });
    });
});

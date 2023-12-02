<?php

use Illuminate\Support\Facades\Route;
use Modules\Discount\Http\Controllers\AmazingDiscountController;
use Modules\Discount\Http\Controllers\CouponDiscountController;
use Modules\Discount\Http\Controllers\CommonDiscountController;


Route::middleware('api')->prefix('api')->group(function () {

    Route::prefix('admin')->group(function () {
        Route::prefix('market')->group(function () {

            Route::prefix('discounts')->group(function () {

                Route::prefix('amazing')->group(function () {
                    Route::get('/', [AmazingDiscountController::class, 'index'])->name('admin.market.discounts.amazing.index');
                    Route::post('/', [AmazingDiscountController::class, 'store'])->name('admin.market.discounts.amazing.store');
                    Route::get('{amazing_discount}', [AmazingDiscountController::class, 'show'])->name('admin.market.discounts.amazing.show');
                    Route::patch('{amazing_discount}', [AmazingDiscountController::class, 'update'])->name('admin.market.discounts.amazing.update');
                    Route::delete('{amazing_discount}', [AmazingDiscountController::class, 'destroy'])->name('admin.market.discounts.amazing.delete');
                });

                Route::prefix('coupons')->group(function () {
                    Route::get('/', [CouponDiscountController::class, 'index'])->name('admin.market.discounts.coupon.index');
                    Route::post('/', [CouponDiscountController::class, 'store'])->name('admin.market.discounts.coupon.store');
                    Route::get('{coupon_discount}', [CouponDiscountController::class, 'show'])->name('admin.market.discounts.coupon.show');
                    Route::patch('{coupon_discount}', [CouponDiscountController::class, 'update'])->name('admin.market.discounts.coupon.update');
                    Route::delete('{coupon_discount}', [CouponDiscountController::class, 'destroy'])->name('admin.market.discounts.coupon.delete');
                });

                Route::prefix('common')->group(function () {
                    Route::get('/', [CommonDiscountController::class, 'index'])->name('admin.market.discounts.common.index');
                    Route::post('/', [CommonDiscountController::class, 'store'])->name('admin.market.discounts.common.store');
                    Route::get('{common_discount}', [CommonDiscountController::class, 'show'])->name('admin.market.discounts.common.show');
                    Route::patch('{common_discount}', [CommonDiscountController::class, 'update'])->name('admin.market.discounts.common.update');
                    Route::delete('{common_discount}', [CommonDiscountController::class, 'destroy'])->name('admin.market.discounts.common.delete');
                });
            });
        });
    });
});

<?php

use Illuminate\Support\Facades\Route;
use Modules\Discount\Http\Controllers\AmazingDiscountController;
use Modules\Discount\Http\Controllers\CouponDiscountController;
use Modules\Discount\Http\Controllers\CommonDiscountController;

Route::middleware('auth:api')->prefix('api')->group(function () {

    Route::prefix('admin')->group(function () {

        Route::prefix('discounts')->group(function () {

            Route::prefix('amazing')->group(function () {
                Route::get('/', [AmazingDiscountController::class, 'index']);
                Route::post('/', [AmazingDiscountController::class, 'store']);
                Route::get('{amazing_discount}', [AmazingDiscountController::class, 'show']);
                Route::patch('{amazing_discount}', [AmazingDiscountController::class, 'update']);
                Route::patch('{amazing_discount}/update-status', [AmazingDiscountController::class, 'updateStatus']);
                Route::delete('{amazing_discount}', [AmazingDiscountController::class, 'destroy']);
            });

            Route::prefix('coupons')->group(function () {
                Route::get('/', [CouponDiscountController::class, 'index']);
                Route::post('/', [CouponDiscountController::class, 'store']);
                Route::get('{coupon_discount}', [CouponDiscountController::class, 'show']);
                Route::patch('{coupon_discount}', [CouponDiscountController::class, 'update']);
                Route::patch('{coupon_discount}/update-status', [CouponDiscountController::class, 'updateStatus']);
                Route::delete('{coupon_discount}', [CouponDiscountController::class, 'destroy']);
            });

            Route::prefix('common')->group(function () {
                Route::get('/', [CommonDiscountController::class, 'index']);
                Route::post('/', [CommonDiscountController::class, 'store']);
                Route::get('{common_discount}', [CommonDiscountController::class, 'show']);
                Route::patch('{common_discount}', [CommonDiscountController::class, 'update']);
                Route::patch('{common_discount}/update-status', [CommonDiscountController::class, 'updateStatus']);
                Route::delete('{common_discount}', [CommonDiscountController::class, 'destroy']);
            });
        });

    });
});

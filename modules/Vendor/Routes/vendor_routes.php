<?php


use Illuminate\Support\Facades\Route;
use Modules\Vendor\Http\Controllers\VendorPaymentController;
use Modules\Vendor\Http\Controllers\VendorProductController;
use \Modules\Vendor\Http\Controllers\VendorCouponDiscountController;

Route::middleware(['api'])->prefix('api')->group(function () {
    Route::prefix('vendor')->group(function () {

        Route::prefix('payments')->group(function () {
            Route::get('online', [VendorPaymentController::class, 'getOnlinePayments']);
            Route::get('offline', [VendorPaymentController::class, 'getOfflinePayments']);
            Route::get('cash', [VendorPaymentController::class, 'getCashPayments']);
            Route::get('{payment}/show', [VendorPaymentController::class, 'show']);
            Route::patch('{payment}/update-status', [VendorPaymentController::class, 'updateStatus']);
//                Route::patch('{payment}/update-status', [VendorPaymentController::class, 'updateStatus']);
        });

        Route::prefix('market')->group(function () {

            Route::prefix('products')->group(function () {
                Route::get('/', [VendorProductController::class, 'index']);
                Route::get('/create', [VendorProductController::class, 'create']);
                Route::post('/', [VendorProductController::class, 'store']);
                Route::get('{product}', [VendorProductController::class, 'show']);
                Route::patch('{product}', [VendorProductController::class, 'update']);
                Route::delete('{product}', [VendorProductController::class, 'destroy']);

            });

        });

        Route::prefix('discounts')->group(function () {
            Route::prefix('coupons')->group(function () {
                Route::get('/', [VendorCouponDiscountController::class, 'index']);
                Route::post('/', [VendorCouponDiscountController::class, 'store']);
                Route::get('{coupon_discount}', [VendorCouponDiscountController::class, 'show']);
                Route::patch('{coupon_discount}', [VendorCouponDiscountController::class, 'update']);
                Route::patch('{coupon_discount}/update-status', [VendorCouponDiscountController::class, 'updateStatus']);
                Route::delete('{coupon_discount}', [VendorCouponDiscountController::class, 'destroy']);
            });

        });


    });
});






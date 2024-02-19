<?php
use Illuminate\Support\Facades\Route;
use Modules\User\Http\Controllers\AuthController;


Route::middleware('web')->group(function () {
    Route::middleware('guest')->group(function () {
        Route::get('auth', [AuthController::class, 'showOtpForm'])->name('auth.otp.show-form');
        Route::post('auth', [AuthController::class, 'authenticate'])->name('auth.otp.authenticate');

        Route::get('confirmation/{token}', [AuthController::class, 'showConfirmationCodeForm'])->name('auth.otp.show-confirmation-form');
        Route::post('confirmation', [AuthController::class, 'confirmationCode'])->name('auth.otp.confirmation');
    });

    Route::middleware('auth')->group(function () {
        Route::get('logout', [AuthController::class, 'logout'])->name('logout');
    });
});

Route::middleware(['api','auth:sanctum'])->group(function () {
    Route::get('user/auth', [AuthController::class, 'getAuthUser']);
});



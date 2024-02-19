<?php
use Illuminate\Support\Facades\Route;
use Modules\User\Http\Controllers\AuthController;


Route::middleware('web')->group(function () {
    Route::get('auth', [AuthController::class, 'showOtpForm'])->name('auth.otp.show-form');
    Route::post('auth', [AuthController::class, 'authenticate'])->name('auth.otp.authenticate');
});

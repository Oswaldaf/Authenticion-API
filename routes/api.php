<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::prefix('v1.0.0')->group(function() {
    Route::post('login', [AuthController::class, 'login']);
    Route::post('register',[AuthController::class, 'register']);
    Route::post('otp-code', [AuthController::class,'checkOtpCode']);

    Route::middleware(['auth:sanctum'])->group(function() {
        Route::get('users', [UserController::class, 'index']);
        Route::get('logout', [AuthController::class, 'logout']);
    });
});

Route::prefix('v1.0.0')->group(function() {

    // Route::post('register', [AuthController::class, 'register']);
    // Route::post('login', [AuthController::class, 'login']);
    // Route::post('otp_code', [AuthController::class, 'checkOtpCode']);

   

});
<?php

use App\Http\Controllers\Api\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::group([
    'middleware' => 'auth:sanctum'
], function () {
    Route::prefix('users/')->group(function () {
        Route::get('me', function (Request $request) {
            return $request->user();
        });
    });
});

Route::group([
    'middleware' => 'guest'
], function () {
    Route::prefix('users/')->group(function () {
        Route::post('register', [AuthController::class, 'register'])->name('user.register');
        Route::post('login', [AuthController::class, 'login'])->name('user.login');
    });
});


<?php

use Illuminate\Support\Facades\Route;

Route::get('/ping', function () {
    return 'pong';
})->name('api.v1.ping');

// Auth
Route::group([
    'prefix' => 'auth'
], function () {
    Route::post('sign-in', [\App\Http\Controllers\Api\v1\Auth\SignInController::class, '__invoke'])->name('sign-in.login');
    Route::post('sign-up', [\App\Http\Controllers\Api\v1\Auth\SignUpController::class, '__invoke'])->name('sign-in.registration');
    Route::group(['middleware' => 'auth'], function () {
        Route::post('sign-out', [\App\Http\Controllers\Api\v1\Auth\SignOutController::class, '__invoke'])->name('sign-in.logout');
        Route::post('me', [\App\Http\Controllers\Api\v1\Auth\MeController::class, '__invoke'])->name('sign-in.me');
    });
});


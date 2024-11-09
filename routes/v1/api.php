<?php

use App\Http\Controllers\Api\v1\Auth\MeController;
use App\Http\Controllers\Api\v1\Auth\SignInController;
use App\Http\Controllers\Api\v1\Auth\SignOutController;
use App\Http\Controllers\Api\v1\Auth\SignUpController;
use Illuminate\Support\Facades\Route;

Route::get('/ping', function () {
    return 'pong';
})->name('api.v1.ping');


Route::group([
    'prefix' => 'auth'
], function () {
    // no authorized
    Route::post('sign-in', [SignInController::class, '__invoke'])->name('sign-in.login');
    Route::post('sign-up', [SignUpController::class, '__invoke'])->name('sign-in.registration');
    // authorized
    Route::group(['middleware' => 'auth'], function () {
        Route::post('sign-out', [SignOutController::class, '__invoke'])->name('sign-in.logout');
        Route::post('/me', [MeController::class, '__invoke'])->name('sign-in.me');
    });
});


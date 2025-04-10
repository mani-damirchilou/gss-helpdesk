<?php

use App\Http\Controllers\Auth\LoginController;
use Illuminate\Support\Facades\Route;

Route::middleware('guest')->group(function () {

//    Login routes
    Route::prefix('login')->controller(LoginController::class)->group(function () {
        Route::get('/', 'create')->name('login');
        Route::post('/', 'store');
    });

});

<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Middleware\SsoAuth;
use Illuminate\Support\Facades\Route;



Route::get('/', [AuthController::class, 'signin'])->name('signin');
Route::post('/login', [AuthController::class, 'redirectToSSOServer'])->name('login');


Route::group(['middleware' => SsoAuth::class], function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
});
// Route::get('/callback', [AuthController::class, 'handleSSOCallback'])->name('callback');
// Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

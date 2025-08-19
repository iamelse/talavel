<?php

use App\Http\Controllers\Web\Auth\LoginController;
use App\Http\Controllers\Web\Backend\DashboardController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

/*
|--------------------------------------------------------------------------
| Guest Routes
|--------------------------------------------------------------------------
*/
Route::prefix('auth')->middleware('is.guest')->group(function () {
    Route::get('/login', [LoginController::class, 'index'])->name('auth.login');
    Route::post('/authenticate', [LoginController::class, 'authenticate'])->name('auth.authenticate');
});

/*
|--------------------------------------------------------------------------
| Admin Routes (Protected by Auth)
|--------------------------------------------------------------------------
*/
Route::prefix('admin')->middleware('is.auth')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('be.dashboard.index');
});
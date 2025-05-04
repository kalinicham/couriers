<?php

use App\Http\Controllers\Auth\SessionController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Dashboard\CourierController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
})->name('home');


Route::get('login', [SessionController::class, 'showLoginForm'])->name('login');
Route::post('login', [SessionController::class, 'login']);
Route::post('logout', [SessionController::class, 'logout']);

Route::get('register', [RegisterController::class, 'showRegisterForm'])->name('register');
Route::post('register', [RegisterController::class, 'register']);

Route::get('dashboard', [DashboardController::class, 'showDashboard'])
    ->middleware('auth')
    ->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::resource('couriers', CourierController::class)->except('show');
});

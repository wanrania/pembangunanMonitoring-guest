<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProyekController;
use App\Http\Controllers\GuestController;
use App\Http\Controllers\DashboardController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// Halaman utama (guest)
Route::get('/', [GuestController::class, 'index'])->name('guest.index');

// ==================== AUTH ====================
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');     // form login
Route::post('/login', [AuthController::class, 'login'])->name('login.post');       // proses login
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');         // logout user

// ==================== DASHBOARD (hanya bisa diakses setelah login) ====================
Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // CRUD Proyek (pakai versi kamu yang sudah jalan)
    Route::resource('proyek', ProyekController::class);

    // CRUD User
    Route::resource('user', UserController::class);
});

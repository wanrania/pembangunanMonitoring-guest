<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProyekController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WargaController;
use Illuminate\Support\Facades\Route;

// Auth
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.post');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Dashboard
Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

// CRUD Proyek
Route::resource('proyek', ProyekController::class);

// CRUD User
Route::resource('user', UserController::class);

// CRUD Warga
Route::resource('warga', WargaController::class);

Route::get('/about', function () {
    return view('pages.guest.about');
})->name('about');

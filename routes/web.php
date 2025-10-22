<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\GuestController;
use App\Http\Controllers\ProyekController;
use App\Http\Controllers\DashboardController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/guest', [GuestController::class, 'index']);

Route::get('/auth', [AuthController::class, 'index'])->name('auth.index');
Route::post('/auth/login', [AuthController::class, 'login'])->name('auth.login');

Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');

Route::resource('proyek', ProyekController::class);

Route::get('/proyek/create', [ProyekController::class, 'create'])->name('proyek.create');
Route::post('/proyek', [ProyekController::class, 'store'])->name('proyek.store');

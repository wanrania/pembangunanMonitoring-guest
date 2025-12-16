<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WargaController;
use App\Http\Controllers\ProyekController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\KontraktorController;
use App\Http\Controllers\LokasiProyekController;
use App\Http\Controllers\ProgresProyekController;
use App\Http\Controllers\TahapanProyekController;

/*
|--------------------------------------------------------------------------
| PUBLIC ROUTES (TANPA LOGIN)
|--------------------------------------------------------------------------
| Hanya Home & About
*/
Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
Route::get('/about', fn () => view('pages.guest.about'))->name('about');

/*
|--------------------------------------------------------------------------
| AUTH ROUTES
|--------------------------------------------------------------------------
*/
Route::get('/login', [AuthController::class, 'index'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.process');
Route::get('/logout', function () {
    Auth::logout();
    request()->session()->invalidate();
    request()->session()->regenerateToken();
    return redirect()->route('dashboard');
})->name('logout');

// REGISTER
Route::get('/register', [AuthController::class, 'registerForm'])->name('register');
Route::post('/register', [AuthController::class, 'register'])->name('register.process');


/*
|--------------------------------------------------------------------------
| AUTHENTICATED USERS (SEMUA ROLE)
|--------------------------------------------------------------------------
| Proyek hanya bisa diakses jika login
*/
Route::middleware(['auth'])->group(function () {

    Route::get('/proyek', [ProyekController::class, 'index'])->name('proyek.index');
    Route::get('/proyek/detail/{id}', [ProyekController::class, 'show'])->name('proyek.show');

});

/*
|--------------------------------------------------------------------------
| ADMIN / STAFF ONLY
|--------------------------------------------------------------------------
| CRUD & Data Master
*/
Route::middleware(['auth', 'checkrole:Admin,Staff'])->group(function () {

    Route::resource('proyek', ProyekController::class)->except(['index', 'show']);

    Route::delete('/media/{id}', [ProyekController::class, 'destroyMedia'])
        ->name('media.destroy');

    Route::resource('user', UserController::class);
    Route::resource('warga', WargaController::class);
    Route::resource('lokasi', LokasiProyekController::class);
    Route::resource('tahapan', TahapanProyekController::class);
    Route::resource('progres', ProgresProyekController::class);
    Route::resource('kontraktor', KontraktorController::class);

});

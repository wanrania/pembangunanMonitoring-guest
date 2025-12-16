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
| PUBLIC ROUTES
|--------------------------------------------------------------------------
*/
Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
Route::get('/about', fn() => view('pages.guest.about'))->name('about');

// PROYEK (public hanya index & show)
Route::get('/proyek', [ProyekController::class, 'index'])->name('proyek.index');
Route::get('/proyek/detail/{id}', [ProyekController::class, 'show'])->name('proyek.show');

// AUTH
Route::get('/login', [AuthController::class, 'index'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.process');
Route::get('/logout', function () {
    Auth::logout(); request()->session()->invalidate(); request()->session()->regenerateToken();
    return redirect()->route('dashboard');
})->name('logout');


/*
|--------------------------------------------------------------------------
| ADMIN / STAFF ROUTES
|--------------------------------------------------------------------------
*/
Route::middleware(['checkrole:Admin,Staff'])->group(function () {

    // PROYEK: create, store, edit, update, delete (index & show tidak dipakai)
    Route::resource('proyek', ProyekController::class)->except(['index', 'show']);

    Route::delete('/media/{id}', [ProyekController::class, 'destroyMedia'])->name('media.destroy');

    Route::resource('user', UserController::class);
    Route::resource('warga', WargaController::class);
    Route::resource('lokasi', LokasiProyekController::class);
    Route::resource('tahapan', TahapanProyekController::class);
    Route::resource('progres', ProgresProyekController::class);
    Route::resource('kontraktor', KontraktorController::class);
});

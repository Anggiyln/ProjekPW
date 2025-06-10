<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\UserController;
use App\Http\Controllers\KonsultasiController;
use App\Http\Controllers\PasienController;

/*
|--------------------------------------------------------------------------
| Public Routes
|--------------------------------------------------------------------------
*/

Route::get('/login', function () {
    return view('login');
})->name('login');

Route::post('/login', [UserController::class, 'login']);

Route::get('/register', [UserController::class, 'showRegister'])->name('register.form');

Route::get('/register', function () {
    return view('register');
})->name('register');

Route::post('/register', [UserController::class, 'register']);

/*
|--------------------------------------------------------------------------
| Protected Routes (require login)
|--------------------------------------------------------------------------
*/
Route::middleware(['auth'])->group(function () {

    Route::get('/', fn () => redirect('/dashboard'));

    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    // Pasien
    Route::resource('pasien', PasienController::class);

    Route::get('pasien/{id}/delete', [PasienController::class, 'deleteConfirmation'])->name('pasien.deleteConfirmation');

    // Konsultasi
    Route::post('/konsultasi', [KonsultasiController::class, 'konsultasi']);

    Route::get('/pilih-poli', [PasienController::class, 'pilihPoli'])->name('pilih.poli');
    Route::get('/lanjut-jadwal', [KonsultasiController::class, 'jadwal'])->name('lanjut.jadwal');

    // Logout
    Route::post('/logout', [UserController::class, 'logout'])->name('logout');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware('auth');

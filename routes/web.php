<?php
// Route::get/(ambilData)/('/url/', /function Atau [Controller]/)
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\KonsultasiController;

Route::get('/', function () {
    return view('layouts.app');
});
Route::get('/dashboard', function () {
    return view('dashboard');
});


Route::get('/pasien', [PasienController::class, 'index']);
Route::get('/pasien/create', [PasienController::class, 'create']);
Route::get('pasien/{pasien}/edit', [PasienController::class, 'edit'])->name('pasien.edit');
Route::post('/pasien', [PasienController::class, 'store']);
Route::PUT('/pasien/{id}', [PasienController::class, 'update']);
Route::get('pasien/{id}/delete', [PasienController::class, 'deleteConfirmation'])->name('pasien.deleteConfirmation');
Route::delete('pasien/{id}', [PasienController::class, 'destroy'])->name('pasien.destroy');

// Route::resource('/pasien', \App\Http\Controllers\PasienController::class);
Route::resource('pasien', \App\Http\Controllers\PasienController::class);

// Route::middleware(['auth'])->group(function () {
//     Route::get('/pasien', [PasienController::class, 'index']);
//     Route::post('/pasien', [PasienController::class, 'store']);
//     // route lain yang butuh login
// });



Route::get('/register', function () {
    return view('register');
});
Route::get('/login', function () {
    return view('login');
})->name('login');  // <-- ini penting

Route::post('/login', [UserController::class, 'login']);

Route::POST('/register', [UserController::class, 'register']);
// Route::post('/logout', [UserController::class, 'logout']);
// Route::post('/login', [UserController::class, 'login']);
Route::post('/konsultasi', [KonsultasiController::class, 'konsultasi']);

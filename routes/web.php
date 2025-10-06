<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EventsController;
use App\Http\Controllers\RegisterController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Di sini didefinisikan semua route untuk aplikasi.
| Struktur sudah dibagi menjadi:
| - Route Public (Landing & Pendaftaran Event)
| - Route Admin (Dashboard & Manajemen Data)
|
*/

// ===============================
// 🔸 PUBLIC ROUTES
// ===============================

// Landing Page
Route::get('/', function () {
    return view('welcome');
})->name('home');

// Form pendaftaran event
Route::get('/daftar-event', [RegisterController::class, 'index'])
    ->name('event.register.form');

// Simpan data pendaftaran event
Route::post('/event/register', [RegisterController::class, 'store'])
    ->name('event.register');


// ===============================
// 🔸 ADMIN DASHBOARD ROUTES
// ===============================
Route::prefix('admin/dashboard')->group(function () {

    // Dashboard utama
    Route::get('/', function () {
        return view('dashboard-admin.dashboard');
    })->name('admin.dashboard');

    // Data registrasi event (tabel)
    Route::get('/registration', [RegisterController::class, 'showAll'])
        ->name('registrations.index');


    // Resource event CRUD
    Route::resource('events', EventsController::class);
});


// ===============================
// 🔸 REGISTRATION MANAGEMENT ROUTES (GLOBAL)
// ===============================

// Hapus data registrasi
Route::delete('/registrations/{registration}', [RegisterController::class, 'destroy'])
    ->name('registrations.destroy');

// Ekspor data registrasi
Route::get('/registrations/export', [RegisterController::class, 'export'])
    ->name('registrations.export');

// Fitur pencarian registrasi
Route::get('/registrations/search', [RegisterController::class, 'search'])
    ->name('registrations.search');

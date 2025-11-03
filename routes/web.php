<?php

use App\Http\Controllers\Auth\UserController;
use App\Http\Controllers\FeedbackController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\eventsController;
use App\Http\Controllers\registerController;
use App\Http\Controllers\AuthController;
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
Route::get('/daftar-event', [registerController::class, 'index'])
    ->name('event.register.form');

Route::post('/event/register', [registerController::class, 'store'])
    ->name('event.register.store');

// get form feedback
Route::get('/class/feedback', [FeedbackController::class, 'index'])
    ->name('class.feedback.index');

Route::post('/event/feedback/store', [FeedbackController::class, 'store'])
    ->name('event.feedback.store');

    // === Route Auth ===
Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register']);

Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');


// === Route Protected ===
Route::middleware('auth')->group(function () {

// ===============================
// 🔸 ADMIN DASHBOARD ROUTES
// ===============================
Route::prefix('admin/dashboard')->group(function () {

    // Dashboard utama
    Route::get('/', function () {
        return view('dashboard-admin.dashboard');
    })->name('admin.dashboard');

    // Data registrasi event (tabel)
    Route::get('/registration', [registerController::class, 'showAll'])
        ->name('registrations.index');


    // Data users (tabel)
    Route::get('/users', [UserController::class, 'index'])
        ->name('users.index');

        Route::get('/feedback', [FeedbackController::class, 'show'])
        ->name('feedback.index');


    // Resource event CRUD
    Route::resource('events', eventsController::class);
});


// ===============================
// 🔸 REGISTRATION MANAGEMENT ROUTES (GLOBAL)
// ===============================

// Hapus data registrasi
Route::delete('/registrations/{registration}', [registerController::class, 'destroy'])
    ->name('registrations.destroy');

// Ekspor data registrasi
Route::get('/registrations/export', [registerController::class, 'export'])
    ->name('registrations.export');

// Fitur pencarian registrasi
Route::get('/registrations/search', [registerController::class, 'search'])
    ->name('registrations.search');
});




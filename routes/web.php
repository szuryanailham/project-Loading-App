<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EventsController;
use App\Http\Controllers\RegisterController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// Landing page
Route::get('/', function () {
    return view('welcome');
});

// Registrasi event (User)
Route::get('/daftar-event', [RegisterController::class, 'index'])
    ->name('event.register.form');
Route::post('/event/register', [RegisterController::class, 'store'])
    ->name('event.register');

// Admin dashboard
Route::prefix('admin/dashboard')->group(function () {
    Route::get('/', function () {
        return view('dashboard-admin.dashboard');
    })->name('admin.dashboard');

Route::get('/registration', [RegisterController::class, 'showAll'])
        ->name('registrations.index');
        
Route::resource('events', EventsController::class);

});

// Registrations management
Route::delete('/registrations/{registration}', [RegisterController::class, 'destroy'])
    ->name('registrations.destroy');

Route::get('/registrations/export', [RegisterController::class, 'export'])
    ->name('registrations.export');

Route::get('/registrations/search', [RegisterController::class, 'search'])
    ->name('registrations.search');

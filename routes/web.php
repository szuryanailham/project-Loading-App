<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\eventsController;
use App\Http\Controllers\registerController;

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
Route::get('/daftar-event', [registerController::class, 'index'])
    ->name('event.register.form');
Route::post('/event/register', [registerController::class, 'store'])
    ->name('event.register');

// Admin dashboard
Route::prefix('admin/dashboard')->group(function () {
    Route::get('/', function () {
        return view('dashboard-admin.dashboard');
    })->name('admin.dashboard');

Route::get('/registration', [registerController::class, 'showAll'])
        ->name('registrations.index');
        
Route::resource('events',  eventsController::class);

});

// Registrations management
Route::delete('/registrations/{registration}', [registerController::class, 'destroy'])
    ->name('registrations.destroy');

Route::get('/registrations/export', [registerController::class, 'export'])
    ->name('registrations.export');

Route::get('/registrations/search', [registerController::class, 'search'])
    ->name('registrations.search');

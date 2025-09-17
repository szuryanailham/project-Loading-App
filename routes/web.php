<?php

use App\Http\Controllers\eventsController;
use App\Http\Controllers\registerController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/register', [registerController::class, 'index'])->name('event.register.form');
Route::post('/event/register', [registerController::class, 'store'])->name('event.register');

// admin routeer
Route::get('/admin/dashboard', function(){
    return view('dashboard-admin.dashboard');
});

Route::get('/admin/dashboard/registration', [RegisterController::class, 'showAll'])
    ->name('registrations.index');

    
Route::delete('/registrations/{registration}', [registerController::class, 'destroy'])
    ->name('registrations.destroy');


Route::get('/registrations/export', [registerController::class, 'export'])
->name('registrations.export');

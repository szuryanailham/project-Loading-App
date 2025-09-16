<?php

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
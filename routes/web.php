<?php
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ProductController;
use App\Http\Controllers\AuthController;

Route::resource('products', ProductController::class);





// Formulaire singup
Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('signup.form');
Route::post('/register', [AuthController::class, 'register'])->name('signup');

// Formulaire login
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login.form');
Route::post('/login', [AuthController::class, 'login'])->name('login');

// logout
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

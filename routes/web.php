<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SubscriptionPackageController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// Homepage (Marvel Comics & Books Catalog)
Route::get('/', [HomeController::class, 'index'])->name('home');

// Authentication Routes
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Marvel Unlimited Subscription Routes
Route::get('/unlimited', [SubscriptionPackageController::class, 'index'])->name('unlimited');
Route::post('/unlimited/subscribe/{id}', [SubscriptionPackageController::class, 'subscribe'])->name('unlimited.subscribe');
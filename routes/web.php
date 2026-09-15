<?php

use App\Models\Book;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    $books = Book::query()->latest()->take(8)->get();

    if ($books->isEmpty()) {
        $books = collect([
            (object) [
                'cover' => 'https://www.gamereactor.asia/media/97/celebratecomingpride_4839713b.jpg',
                'title' => 'Marvel Comics',
                'price' => 125000,
            ],
            (object) [
                'cover' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQ6bas0khihx0mgq6pJ3aKt9zFjxKlexTz4p27j9xI_4g&s=10',
                'title' => 'Marvel Collection',
                'price' => 150000,
            ],
            (object) [
                'cover' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRfaSI4IcTNgIn65cMcF4OWf_8Sdcenf5Zsv_aqiwqauA&s=10',
                'title' => 'Marvel Heroes',
                'price' => 175000,
            ],
            (object) [
                'cover' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRMWl0Em7Ku_AmIsMukhJEHm8c71tgv-slaj4CvNgVqVQ&s=10',
                'title' => 'Marvel Universe',
                'price' => 200000,
            ],
        ]);
    }

    return view('home', compact('books'));
})->name('home');

use App\Http\Controllers\AuthController;

// Auth Routes
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

use App\Http\Controllers\SubscriptionPackageController;

// Marvel Unlimited Subscription Routes
Route::get('/unlimited', [SubscriptionPackageController::class, 'index'])->name('unlimited');
Route::post('/unlimited/subscribe/{id}', [SubscriptionPackageController::class, 'subscribe'])->name('unlimited.subscribe');
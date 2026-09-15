<?php

use App\Models\Book;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    // 1. Buku Pilihan (Katalog Reguler)
    $books = Book::query()->where('price', '>', 0)->latest()->take(4)->get();

    if ($books->isEmpty()) {
        $books = collect([
            (object) [
                'cover' => 'https://www.gamereactor.asia/media/97/celebratecomingpride_4839713b.jpg',
                'title' => 'Marvel Comics',
                'writer' => 'Stan Lee',
                'price' => 125000,
            ],
            (object) [
                'cover' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQ6bas0khihx0mgq6pJ3aKt9zFjxKlexTz4p27j9xI_4g&s=10',
                'title' => 'Marvel Collection',
                'writer' => 'Jack Kirby',
                'price' => 150000,
            ],
            (object) [
                'cover' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRfaSI4IcTNgIn65cMcF4OWf_8Sdcenf5Zsv_aqiwqauA&s=10',
                'title' => 'Marvel Heroes',
                'writer' => 'Jonathan Hickman',
                'price' => 175000,
            ],
            (object) [
                'cover' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRMWl0Em7Ku_AmIsMukhJEHm8c71tgv-slaj4CvNgVqVQ&s=10',
                'title' => 'Marvel Universe',
                'writer' => 'Al Ewing',
                'price' => 200000,
            ],
        ]);
    }

    // 2. Buku & Komik Gratis (PDF - Harga 129rb jadi Rp 0)
    $freeBooks = Book::query()->where('price', 0)->latest()->take(8)->get();

    if ($freeBooks->isEmpty()) {
        $freeBooks = collect([
            (object) [
                'cover' => 'https://cdn.marvel.com/u/prod/marvel/i/mg/d/40/019f6233079e/portrait_uncanny.webp',
                'title' => 'Star Wars: The Book Of Boba Fett (2026) #1',
                'writer' => 'Rodney Barnes',
                'original_price' => 129000,
                'price' => 0,
            ],
            (object) [
                'cover' => 'https://cdn.marvel.com/u/prod/marvel/i/mg/f/70/019f620c800c/portrait_uncanny.webp',
                'title' => 'Marvel Mangaverse: Iron Knight (2026) #1',
                'writer' => 'C.B. Cebulski',
                'original_price' => 129000,
                'price' => 0,
            ],
            (object) [
                'cover' => 'https://cdn.marvel.com/u/prod/marvel/i/mg/3/30/019f055e72fd/portrait_uncanny.webp',
                'title' => 'Challenges of Doom: Spider-Man (2026) #1',
                'writer' => 'Dan Slott',
                'original_price' => 129000,
                'price' => 0,
            ],
            (object) [
                'cover' => 'https://cdn.marvel.com/u/prod/marvel/i/mg/f/70/019f620d701b/portrait_uncanny.webp',
                'title' => 'Marvel Gold \'76 (2026) #1',
                'writer' => 'Roy Thomas & Stan Lee',
                'original_price' => 129000,
                'price' => 0,
            ],
            (object) [
                'cover' => 'https://cdn.marvel.com/u/prod/marvel/i/mg/d/03/019e4be83995/portrait_uncanny.webp',
                'title' => 'Doomquest (2026) #4',
                'writer' => 'David Michelinie',
                'original_price' => 129000,
                'price' => 0,
            ],
            (object) [
                'cover' => 'https://cdn.marvel.com/u/prod/marvel/i/mg/2/80/01a08be28d35/portrait_uncanny.webp',
                'title' => 'Punisher (2026) #8',
                'writer' => 'Garth Ennis',
                'original_price' => 129000,
                'price' => 0,
            ],
            (object) [
                'cover' => 'https://cdn.marvel.com/u/prod/marvel/i/mg/f/70/019f6205e2b0/portrait_uncanny.webp',
                'title' => 'Inglorious X-Force (2026) #9',
                'writer' => 'Rick Remender',
                'original_price' => 129000,
                'price' => 0,
            ],
            (object) [
                'cover' => 'https://cdn.marvel.com/u/prod/marvel/i/mg/c/e0/019f62066e13/portrait_uncanny.webp',
                'title' => 'Iron Man (2026) #9',
                'writer' => 'Gerry Duggan',
                'original_price' => 129000,
                'price' => 0,
            ],
        ]);
    }

    return view('home', compact('books', 'freeBooks'));
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
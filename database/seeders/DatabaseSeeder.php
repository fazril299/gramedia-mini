<?php

namespace Database\Seeders;

use App\Models\Book;
use App\Models\BookCategory;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::firstOrCreate(
            ['email' => 'fazriel@marvel.com'],
            ['name' => 'Fazriel', 'password' => Hash::make('password123')]
        );

        User::firstOrCreate(
            ['email' => 'test@example.com'],
            ['name' => 'Test User', 'password' => Hash::make('password123')]
        );

        $category = BookCategory::firstOrCreate(['name' => 'Marvel Digital Comics']);
        $catGraphic = BookCategory::firstOrCreate(['name' => 'Graphic Novel']);

        $freeBooks = [
            [
                'title' => 'Star Wars: The Book Of Boba Fett (2026) #1',
                'writer' => 'Rodney Barnes',
                'cover' => 'https://cdn.marvel.com/u/prod/marvel/i/mg/d/40/019f6233079e/portrait_uncanny.webp',
                'description' => 'Edisi digital PDF eksklusif kisah legendaris pemburu hadiah Boba Fett di Tatooine.',
                'price' => 0,
                'language' => 'English / ID Sub',
                'publisher' => 'Marvel Comics',
                'release_date' => '2026-01-10',
                'page_of_book' => 140,
                'book_category_id' => $category->id,
            ],
            [
                'title' => 'Marvel Mangaverse: Iron Knight (2026) #1',
                'writer' => 'C.B. Cebulski',
                'cover' => 'https://cdn.marvel.com/u/prod/marvel/i/mg/f/70/019f620c800c/portrait_uncanny.webp',
                'description' => 'Sentuhan gaya manga futuristik petualangan Iron Knight dengan teknologi mech tempur mutakhir.',
                'price' => 0,
                'language' => 'English / ID Sub',
                'publisher' => 'Marvel Comics',
                'release_date' => '2026-01-12',
                'page_of_book' => 128,
                'book_category_id' => $category->id,
            ],
            [
                'title' => 'Challenges of Doom: Spider-Man (2026) #1',
                'writer' => 'Dan Slott',
                'cover' => 'https://cdn.marvel.com/u/prod/marvel/i/mg/3/30/019f055e72fd/portrait_uncanny.webp',
                'description' => 'Pertarungan sengit Spider-Man melintasi dimensi benteng Latveria melawan jebakan Doctor Doom.',
                'price' => 0,
                'language' => 'English / ID Sub',
                'publisher' => 'Marvel Comics',
                'release_date' => '2026-01-15',
                'page_of_book' => 156,
                'book_category_id' => $category->id,
            ],
            [
                'title' => 'Marvel Gold \'76 (2026) #1',
                'writer' => 'Roy Thomas & Stan Lee',
                'cover' => 'https://cdn.marvel.com/u/prod/marvel/i/mg/f/70/019f620d701b/portrait_uncanny.webp',
                'description' => 'Arsip digital restorasi edisi emas era klasik pahlawan terhebat Marvel.',
                'price' => 0,
                'language' => 'English / ID Sub',
                'publisher' => 'Marvel Comics',
                'release_date' => '2026-01-20',
                'page_of_book' => 180,
                'book_category_id' => $catGraphic->id,
            ],
            [
                'title' => 'Doomquest (2026) #4',
                'writer' => 'David Michelinie',
                'cover' => 'https://cdn.marvel.com/u/prod/marvel/i/mg/d/03/019e4be83995/portrait_uncanny.webp',
                'description' => 'Perjalanan ambisius sang penguasa Latveria mencari relik kosmik kuno.',
                'price' => 0,
                'language' => 'English / ID Sub',
                'publisher' => 'Marvel Comics',
                'release_date' => '2026-02-01',
                'page_of_book' => 134,
                'book_category_id' => $category->id,
            ],
            [
                'title' => 'Punisher (2026) #8',
                'writer' => 'Garth Ennis',
                'cover' => 'https://cdn.marvel.com/u/prod/marvel/i/mg/2/80/01a08be28d35/portrait_uncanny.webp',
                'description' => 'Frank Castle memburu sindikat kejahatan bawah tanah tanpa ampun.',
                'price' => 0,
                'language' => 'English / ID Sub',
                'publisher' => 'Marvel Comics',
                'release_date' => '2026-02-05',
                'page_of_book' => 148,
                'book_category_id' => $category->id,
            ],
            [
                'title' => 'Inglorious X-Force (2026) #9',
                'writer' => 'Rick Remender',
                'cover' => 'https://cdn.marvel.com/u/prod/marvel/i/mg/f/70/019f6205e2b0/portrait_uncanny.webp',
                'description' => 'Operasi rahasia skuad X-Force di perbatasan waktu demi masa depan mutan.',
                'price' => 0,
                'language' => 'English / ID Sub',
                'publisher' => 'Marvel Comics',
                'release_date' => '2026-02-10',
                'page_of_book' => 160,
                'book_category_id' => $category->id,
            ],
            [
                'title' => 'Iron Man (2026) #9',
                'writer' => 'Gerry Duggan',
                'cover' => 'https://cdn.marvel.com/u/prod/marvel/i/mg/c/e0/019f62066e13/portrait_uncanny.webp',
                'description' => 'Tony Stark menciptakan baju zirah Mysterium terkuat untuk menghadapi armada Orchis.',
                'price' => 0,
                'language' => 'English / ID Sub',
                'publisher' => 'Marvel Comics',
                'release_date' => '2026-02-15',
                'page_of_book' => 152,
                'book_category_id' => $category->id,
            ],
        ];

        foreach ($freeBooks as $bookData) {
            Book::updateOrCreate(
                ['title' => $bookData['title']],
                $bookData
            );
        }
    }
}

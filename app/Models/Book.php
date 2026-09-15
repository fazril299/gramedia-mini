<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

//fillable= buat bikin keamanan dan ditentuin sama request
#[Fillable([
    'cover',
    'title',
    'price',
    'description',
    'language',
    'publisher',
    'writer',
    'release_date',
    'page_of_book',
    'book_category_id'
    ])]

class Book extends Model
{
    // nama tunggal karena book_categories berperan sebagai one dalam relasi one to many
    //nama fungsi menggunakan nama tunggal(tanpa akhiran s/es/Ies)
    public function bookCategory(): BelongsTo
    {
        return $this->belongsTo(BookCategory::class);
    }
    public function checkoutBooks(): HasMany
    {
        return $this->hasMany(CheckoutBook::class);
    }
    public function subscriptionPackageBooks(): HasMany
    {
        return $this->hasMany(SubscriptionPackageBook::class);
    }

    /**
     * Harga asli sebelum diskon promo Rp 0
     */
    public function getOriginalPriceAttribute(): int
    {
        return 129000;
    }

    /**
     * Ambil buku pilihan berbayar untuk homepage
     */
    public static function getFeaturedBooks(int $limit = 4)
    {
        $books = static::query()->where('price', '>', 0)->latest()->take($limit)->get();

        return $books->isNotEmpty() ? $books : static::fallbackFeaturedBooks();
    }

    /**
     * Ambil komik & buku digital gratis PDF (Rp 0) untuk homepage
     */
    public static function getFreeBooks(int $limit = 8)
    {
        $freeBooks = static::query()->where('price', 0)->latest()->take($limit)->get();

        return $freeBooks->isNotEmpty() ? $freeBooks : static::fallbackFreeBooks();
    }

    /**
     * Data cadangan buku pilihan jika database masih kosong
     */
    protected static function fallbackFeaturedBooks()
    {
        return collect([
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

    /**
     * Data cadangan komik gratis PDF jika database masih kosong
     */
    protected static function fallbackFreeBooks()
    {
        return collect([
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
                'title' => "Marvel Gold '76 (2026) #1",
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
}
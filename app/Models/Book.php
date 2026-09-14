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
};
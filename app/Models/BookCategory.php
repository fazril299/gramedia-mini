<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Relations\HasMany;

//#[Table('book_category')]-> wajib digunakan karena tidak sesuai standar penamaan tabel di Laravel (jamak).
///Namun, karena nama tabel book_categories sudah sesuai dengan standar penamaan tabel di Laravel, maka properti di atas tidak perlu digunakan.
//properti diatas digunakan untuk menentukan nama tabel di database yang penamaannya tidak sesuai dengan
//konvensi penamaan tabel di Laravel(jamak). Namun, karena nama tabel book_categories sudah sesuai dengan
// konvensi penamaan tabel di Laravel, maka properti di atas tidak perlu digunakan.

#[Fillable(['name'])]

class BookCategory extends Model
{
    //nama jamak (menggunakan akhiran s/es/Ies)
    //karena book_categories berperan sebagai many dalam relasi one to many
    public function books(): HasMany
    {
        return $this->hasMany(Book::class);
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Book;

class HomeController extends Controller
{
    /**
     * Display the Marvel Comics homepage.
     */
    public function index()
    {
        $books = Book::getFeaturedBooks();
        $freeBooks = Book::getFreeBooks();

        return view('home', compact('books', 'freeBooks'));
    }
}

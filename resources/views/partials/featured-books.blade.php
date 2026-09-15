<!-- FEATURED BOOKS -->
<section class="container-xl mt-5" id="koleksi">
    <div class="d-flex align-items-center justify-content-between mb-3">
        <h2 class="m-0 text-dark">Featured Books</h2>
        <span class="text-secondary">{{ $books->count() }} books</span>
    </div>

    @forelse ($books as $book)
        @if ($loop->first)
            <div class="row row-cards">
        @endif
                <div class="col-6 col-md-4 col-lg-3">
                    <article class="card h-100">
                        <img class="card-img-top book-cover" src="{{ $book->cover }}" alt="Cover {{ $book->title }}" loading="lazy">
                        <div class="card-body">
                            <h3 class="h3 mb-2">{{ $book->title }}</h3>
                            <p class="text-secondary mb-0">Rp {{ number_format($book->price, 0, ',', '.') }}</p>
                        </div>
                    </article>
                </div>
        @if ($loop->last)
            </div>
        @endif
    @empty
        <div class="empty">
            <p class="empty-title">No books available</p>
            <p class="empty-subtitle text-secondary">Book catalog will appear here once added.</p>
        </div>
    @endforelse
</section>

<!-- FREE BOOKS & COMICS (PDF) (RP 129,000 -> RP 0) -->
<section class="container-xl mt-5 mb-5" id="free-comics">
    <div class="d-flex flex-column flex-md-row align-items-md-center justify-content-between gap-3 mb-4 pb-3 border-bottom">
        <div>
            <h2 class="m-0 text-dark fw-bold" style="font-family: 'Roboto Condensed', sans-serif; letter-spacing: 0.5px; text-transform: uppercase;">
                Free Books & Comics (PDF)
            </h2>
            <p class="text-secondary mb-0 small mt-1">
                Download and read official Marvel digital comics in high-resolution PDF format for free, discounted from Rp 129,000 to Rp 0.
            </p>
        </div>
        <div class="d-flex align-items-center gap-2">
            <span class="badge bg-light text-dark border py-2 px-3 fw-bold" style="font-family: 'Roboto Condensed', sans-serif; letter-spacing: 1px;">
                <i class="fa-solid fa-book-open text-danger me-1"></i> {{ $freeBooks->count() }} FREE COMICS
            </span>
        </div>
    </div>

    @forelse ($freeBooks as $book)
        @if ($loop->first)
            <div class="row row-cards g-3 g-md-4">
        @endif
                <div class="col-6 col-md-4 col-lg-3">
                    <article class="card h-100 shadow-sm border">
                        <!-- Cover Container with Badges -->
                        <div class="position-relative overflow-hidden">
                            <span class="badge bg-danger position-absolute top-0 start-0 m-2 fw-bold text-uppercase shadow-sm" style="font-family: 'Roboto Condensed', sans-serif; font-size: 10px; letter-spacing: 1px; z-index: 2;">
                                <i class="fa-solid fa-file-pdf me-1"></i> PDF
                            </span>
                            <span class="badge bg-success position-absolute top-0 end-0 m-2 fw-bold text-uppercase shadow-sm" style="font-family: 'Roboto Condensed', sans-serif; font-size: 10px; letter-spacing: 1px; z-index: 2;">
                                FREE
                            </span>
                            <img class="card-img-top book-cover" src="{{ $book->cover }}" alt="Cover {{ $book->title }}" loading="lazy">
                        </div>

                        <!-- Card Body -->
                        <div class="card-body d-flex flex-column justify-content-between p-3">
                            <div>
                                <!-- Judul Buku / Title -->
                                <h3 class="card-title text-dark fw-bold mb-1 text-truncate-2" title="{{ $book->title }}" style="font-family: 'Roboto Condensed', sans-serif; font-size: 16px; line-height: 1.25; min-height: 40px;">
                                    {{ $book->title }}
                                </h3>

                                <!-- Penulis / Writer -->
                                <p class="text-secondary small mb-3">
                                    <i class="fa-solid fa-pen-nib text-danger me-1"></i> Author:
                                    <span class="text-dark fw-semibold">{{ $book->writer ?? 'Marvel Comics' }}</span>
                                </p>
                            </div>

                            <div>
                                <!-- Price: Coret 129rb Jadi Rp 0 -->
                                <div class="d-flex align-items-baseline justify-content-between p-2 mb-3 rounded bg-light border">
                                    <div class="d-flex flex-column">
                                        <span class="text-secondary text-uppercase" style="font-size: 9px; letter-spacing: 0.5px;">Original Price</span>
                                        <del class="text-secondary text-decoration-line-through fw-bold" style="font-size: 12px;">
                                            Rp {{ number_format($book->original_price ?? 129000, 0, ',', '.') }}
                                        </del>
                                    </div>
                                    <div class="text-end">
                                        <span class="text-success text-uppercase fw-bold" style="font-size: 9px; letter-spacing: 0.5px;">Now</span>
                                        <div class="text-success fw-bold fs-3" style="font-family: 'Roboto Condensed', sans-serif; line-height: 1;">
                                            Rp {{ number_format($book->price, 0, ',', '.') }}
                                        </div>
                                    </div>
                                </div>

                                <!-- Action Button: Baca / Download PDF -->
                                <button type="button" class="btn btn-danger w-100 fw-bold text-uppercase py-2 marvel-btn-clip d-flex align-items-center justify-content-center gap-2" onclick="openPdfModal('{{ addslashes($book->title) }}', '{{ addslashes($book->writer ?? 'Marvel Comics') }}', '{{ $book->cover }}')">
                                    <i class="fa-solid fa-file-pdf"></i>
                                    <span>READ FREE PDF</span>
                                </button>
                            </div>
                        </div>
                    </article>
                </div>
        @if ($loop->last)
            </div>
        @endif
    @empty
        <div class="empty text-center py-5">
            <div class="empty-icon text-danger mb-3">
                <i class="fa-solid fa-book-open fs-1"></i>
            </div>
            <p class="empty-title text-dark h3 fw-bold">No free comics available</p>
            <p class="empty-subtitle text-secondary">Free digital comics and books catalog will appear here.</p>
        </div>
    @endforelse
</section>

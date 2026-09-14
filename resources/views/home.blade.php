@extends('layouts.app')

@section('content')
<header class="navbar navbar-expand-md d-print-none">
    <div class="container-xl"><button class="navbar-toggler" type="button" data-bs-toggle="collapse"
            data-bs-target="#navbar-menu" aria-controls="navbar-menu" aria-expanded="false"
            aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
        <!-- BEGIN NAVBAR LOGO -->
        <a href="{{ route('home') }}" aria-label="Ebook" class="navbar-brand navbar-brand-autodark me-3">
            <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTOCvNa3r_hszq7pPtvOQKKYOepdqMsD5tJapqoyZoiAA&s=10"
                width="110" height="32" alt="Logo Ebook" class="navbar-brand-image"> Ebook
        </a>
        <!-- END NAVBAR LOGO -->
        <ul class="navbar-nav flex-row align-items-center gap-3 mx-auto">
            {{-- Dropdown kategori --}}
            <li class="nav-item dropdown">
                <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                    Kategori
                </a>
                <div class="dropdown-menu dropdown-menu-arrow">
                    <a href="#" class="dropdown-item">Fiksi</a>
                    <a href="#" class="dropdown-item">Non-Fiksi</a>
                    <a href="#" class="dropdown-item">Biografi</a>
                    <a href="#" class="dropdown-item">Sejarah</a>
                    <a href="#" class="dropdown-item">Ilmu Pengetahuan</a>
                </div>
            </li>
            {{-- Search bar --}}
            <li class="nav-item input-icon" style="width: min(360px, 45vw);">
                <input type="text" class="form-control form-control-rounded"
                    placeholder="Cari buku, penulis, atau kategori" aria-label="Cari buku, penulis, atau kategori">
                <span class="input-icon-addon">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-search" width="24"
                        height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                        stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                        <path d="M3 10a7 7 0 1 0 14 0a7 7 0 0 0 -14 0"></path>
                        <path d="M21 21l-6 -6"></path>
                    </svg>
                </span>
            </li>
        </ul>
        {{-- button login --}}
        <div class="navbar-nav flex-row order-md-last ms-auto">
            <a href="#" class="btn btn-primary">Masuk</a>
            <a href="#" class="btn btn-light">Daftar</a>
        </div>
    </div>
</header>
@endsection
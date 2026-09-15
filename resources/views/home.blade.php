@extends('layouts.app')

@section('content')
<style>
    /* Marvel Red Scrollbar */
    html {
        scrollbar-color: #e62429 #111111;
        scrollbar-width: thin;
    }
    ::-webkit-scrollbar {
        width: 8px;
    }
    ::-webkit-scrollbar-track {
        background: #111111;
    }
    ::-webkit-scrollbar-thumb {
        background: #e62429;
    }
    ::-webkit-scrollbar-thumb:hover {
        background: #b51a1e;
    }

    /* ===================================================
       OFFICIAL MARVEL.COM DUAL-TIER NAVBAR
       =================================================== */
    .marvel-navbar {
        background-color: #202020;
        font-family: 'Roboto Condensed', -apple-system, BlinkMacSystemFont, 'Segoe UI', sans-serif;
        position: sticky;
        top: 0;
        z-index: 1040;
        width: 100%;
        margin: 0;
        padding: 0;
        border-bottom: 1px solid #111111;
    }

    /* Top Bar (Height 52px) */
    .marvel-nav-top {
        height: 52px;
        background-color: #202020;
        border-bottom: 1px solid #393939;
        position: relative;
        width: 100%;
    }

    .marvel-nav-top-container {
        height: 52px;
        width: 100%;
        margin: 0;
        padding: 0 10px;
        display: flex;
        align-items: center;
        justify-content: space-between;
        position: relative;
    }

    /* Left Group: Exact Boxed Cells from Marvel Reference Image */
    .marvel-nav-left {
        height: 52px;
        display: flex;
        align-items: center;
    }

    .marvel-nav-cell {
        height: 52px;
        display: flex;
        align-items: center;
        gap: 8px;
        color: #ffffff !important;
        text-decoration: none !important;
        font-family: 'Roboto Condensed', sans-serif;
        font-size: 12px;
        font-weight: 700;
        letter-spacing: 1.2px;
        text-transform: uppercase;
        padding: 0 16px;
        border-left: 1px solid #393939;
        border-right: 1px solid #393939;
        background: transparent;
        cursor: pointer;
        transition: color 0.15s ease, background-color 0.15s ease;
    }

    .marvel-nav-cell + .marvel-nav-cell {
        border-left: none; /* Avoid duplicate borders between adjacent cells */
    }

    .marvel-nav-cell:hover {
        color: #e62429 !important;
        background-color: rgba(255, 255, 255, 0.03);
    }

    .marvel-nav-cell::after {
        display: none !important; /* Hide dropdown arrow */
    }

    .marvel-user-icon {
        width: 18px;
        height: 18px;
        display: inline-flex;
        align-items: center;
        justify-content: center;
    }

    /* Center: Marvel Red Logo Block (52px flush) */
    .marvel-nav-logo {
        position: absolute;
        left: 50%;
        transform: translateX(-50%);
        top: 0;
        height: 52px;
        display: flex;
        align-items: center;
        justify-content: center;
        z-index: 5;
        text-decoration: none;
    }

    .marvel-nav-logo img {
        height: 52px;
        width: auto;
        display: block;
        background-color: #e62429;
        padding: 0 14px;
        box-shadow: none;
        transition: filter 0.2s ease;
    }

    .marvel-nav-logo:hover img {
        filter: brightness(1.06);
    }

    /* Right Group: Marvel Unlimited Promo & Search Cells */
    .marvel-nav-right {
        height: 52px;
        display: flex;
        align-items: center;
    }

    .marvel-promo-cell {
        height: 52px;
        display: flex;
        align-items: center;
        gap: 9px;
        padding: 0 16px;
        border-left: 1px solid #393939;
        border-right: 1px solid #393939;
        color: #ffffff !important;
        text-decoration: none !important;
        transition: opacity 0.2s ease, background-color 0.15s ease;
    }

    .marvel-promo-cell:hover {
        background-color: rgba(255, 255, 255, 0.03);
    }

    .marvel-promo-copy {
        line-height: 1.15;
        text-align: left;
    }

    .marvel-promo-title {
        font-family: 'Roboto Condensed', sans-serif;
        font-size: 11px;
        font-weight: 800;
        letter-spacing: 0.8px;
        color: #ffffff;
        text-transform: uppercase;
        margin: 0;
    }

    .marvel-promo-sub {
        font-family: 'Roboto Condensed', sans-serif;
        font-size: 10px;
        font-weight: 800;
        letter-spacing: 0.8px;
        color: #ffffff;
        text-transform: uppercase;
        margin: 0;
        transition: color 0.2s ease;
    }

    .marvel-promo-cell:hover .marvel-promo-sub {
        color: #e62429;
    }

    .marvel-search-cell {
        height: 52px;
        padding: 0 16px;
        background: none;
        border: none;
        border-right: 1px solid #393939;
        color: #ffffff;
        cursor: pointer;
        display: flex;
        align-items: center;
        justify-content: center;
        transition: color 0.2s ease, background-color 0.15s ease;
    }

    .marvel-search-cell:hover {
        color: #e62429;
        background-color: rgba(255, 255, 255, 0.03);
    }

    /* Primary Navigation Bar (Height 40px) */
    .marvel-nav-primary {
        height: 40px;
        background-color: #202020;
        display: flex;
        align-items: center;
        justify-content: center;
        border-bottom: 1px solid #111111;
        width: 100%;
    }

    .marvel-nav-menu {
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 28px;
        margin: 0;
        padding: 0;
        list-style: none;
        height: 40px;
    }

    .marvel-nav-item {
        height: 40px;
        display: flex;
        align-items: center;
    }

    .marvel-nav-link {
        color: #ffffff !important;
        text-decoration: none;
        font-size: 12px;
        font-weight: 800;
        letter-spacing: 1.2px;
        text-transform: uppercase;
        height: 40px;
        display: flex;
        align-items: center;
        padding: 0 2px;
        position: relative;
        transition: color 0.2s ease;
    }

    .marvel-nav-link::after {
        content: '';
        position: absolute;
        bottom: 0;
        left: 0;
        width: 100%;
        height: 2px;
        background-color: #e62429;
        transform: scaleX(0);
        transform-origin: center;
        transition: transform 0.2s ease;
    }

    .marvel-nav-link:hover::after,
    .marvel-nav-link.active::after {
        transform: scaleX(1);
    }

    /* Marvel Profile Dropdown (Authentic Marvel.com Style) */
    .marvel-user-dropdown {
        background-color: #151515 !important;
        border: 1px solid #333333 !important;
        border-radius: 0 !important;
        box-shadow: 0 16px 40px rgba(0, 0, 0, 0.95) !important;
        padding: 0 !important;
        width: 320px !important;
        min-width: 320px !important;
        margin-top: 0 !important;
        top: 100% !important;
        left: 0 !important;
        overflow: hidden;
    }

    .marvel-dropdown-gold {
        background-color: #e5a823;
        color: #000000;
        padding: 16px 20px;
        font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
        font-size: 13px;
        line-height: 1.35;
        border-bottom: 1px solid #c9931b;
    }

    .marvel-dropdown-gold p {
        margin: 0 0 6px 0;
        font-weight: 500;
        color: #111111;
    }

    .marvel-dropdown-gold a {
        color: #000000;
        font-family: 'Roboto Condensed', sans-serif;
        font-weight: 900;
        font-size: 11px;
        letter-spacing: 0.8px;
        text-transform: uppercase;
        text-decoration: underline;
        display: inline-block;
        cursor: pointer;
    }

    .marvel-dropdown-gold a:hover {
        color: #222222;
    }

    .marvel-dropdown-promo {
        background-color: #171717;
        border-bottom: 1px solid #282828;
        padding: 16px 20px;
        display: flex;
        align-items: center;
        gap: 16px;
        text-decoration: none !important;
        transition: background-color 0.2s ease;
    }

    .marvel-dropdown-promo:hover {
        background-color: #222222;
    }

    .marvel-dropdown-promo-text {
        font-family: 'Roboto Condensed', sans-serif;
        font-weight: 900;
        font-size: 13px;
        line-height: 1.25;
        letter-spacing: 0.8px;
        color: #ffffff;
        text-transform: uppercase;
    }

    .marvel-dropdown-menu-list {
        padding: 10px 0 14px 0;
        margin: 0;
        list-style: none;
        background-color: #151515;
    }

    .marvel-dropdown-link {
        display: block;
        padding: 9px 20px;
        color: #ffffff !important;
        font-family: 'Roboto Condensed', sans-serif;
        font-weight: 800;
        font-size: 13px;
        letter-spacing: 1px;
        text-transform: uppercase;
        text-decoration: none !important;
        transition: color 0.15s ease, background-color 0.15s ease;
        border: none;
        background: none;
        width: 100%;
        text-align: left;
        cursor: pointer;
    }

    .marvel-dropdown-link:hover {
        color: #e62429 !important;
        background-color: #1f1f1f;
    }

    /* Search Dropdown Drawer */
    .marvel-search-drawer {
        background-color: #151515;
        border-bottom: 2px solid #e62429;
        padding: 14px 0;
        animation: marvelFade 0.2s ease;
    }

    @keyframes marvelFade {
        from { opacity: 0; transform: translateY(-6px); }
        to { opacity: 1; transform: translateY(0); }
    }

    .marvel-search-wrap {
        max-width: 650px;
        margin: 0 auto;
        position: relative;
    }

    .marvel-search-input {
        width: 100%;
        background-color: #222222;
        border: 1px solid #393939;
        color: #ffffff;
        padding: 10px 48px 10px 18px;
        border-radius: 4px;
        font-size: 14px;
        outline: none;
    }

    .marvel-search-input:focus {
        border-color: #e62429;
        background-color: #2a2a2a;
    }

    .marvel-search-submit {
        position: absolute;
        right: 12px;
        top: 50%;
        transform: translateY(-50%);
        background: none;
        border: none;
        color: #aaa;
        cursor: pointer;
    }

    .marvel-search-submit:hover {
        color: #e62429;
    }

    /* Mobile Hamburger */
    .marvel-hamburger-btn {
        background: none;
        border: none;
        color: #ffffff;
        font-size: 20px;
        display: none;
        cursor: pointer;
        padding: 0;
        margin-right: 12px;
    }

    @media (max-width: 991px) {
        .marvel-hamburger-btn {
            display: flex;
            align-items: center;
        }
        .marvel-nav-primary {
            display: none;
        }
        .marvel-promo-item {
            display: none;
        }
    }

    /* ===================================================
       MARVEL.COM COMICS MASTHEAD BANNER (570px)
       =================================================== */
    .marvel-masthead {
        position: relative;
        width: 100%;
        margin: 0;
        padding: 0;
        overflow: hidden;
        background-color: #0b0c10;
    }

    .marvel-masthead,
    .marvel-masthead .carousel-item,
    .marvel-slide {
        height: 570px;
    }

    @media (max-width: 991px) {
        .marvel-masthead,
        .marvel-masthead .carousel-item,
        .marvel-slide {
            height: 480px;
        }
    }

    @media (max-width: 576px) {
        .marvel-masthead,
        .marvel-masthead .carousel-item,
        .marvel-slide {
            height: 420px;
        }
    }

    .marvel-slide {
        position: relative;
        width: 100%;
        height: 100%;
        overflow: hidden;
        background-color: #111111;
    }

    .marvel-masthead.carousel-fade .carousel-item {
        opacity: 0;
        transition-property: opacity;
        transition-duration: 0.8s;
        transition-timing-function: ease-in-out;
    }

    .marvel-masthead.carousel-fade .carousel-item.active {
        opacity: 1;
    }

    .marvel-slide-img {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        object-fit: cover;
        object-position: center center;
        z-index: 1;
        background-color: #111111;
        transform: scale(1.02);
        transition: transform 6s cubic-bezier(0.16, 1, 0.3, 1);
    }

    .carousel-item.active .marvel-slide-img {
        transform: scale(1.06);
    }

    .marvel-gradient-overlay {
        position: absolute;
        inset: 0;
        width: 100%;
        height: 100%;
        background: linear-gradient(90deg, rgba(11, 12, 16, 0.95) 0%, rgba(11, 12, 16, 0.82) 35%, rgba(11, 12, 16, 0.35) 68%, rgba(11, 12, 16, 0) 100%);
        pointer-events: none;
        z-index: 2;
    }

    @media (max-width: 768px) {
        .marvel-gradient-overlay {
            background: linear-gradient(180deg, rgba(11, 12, 16, 0.25) 0%, rgba(11, 12, 16, 0.75) 45%, rgba(11, 12, 16, 0.96) 100%);
        }
    }

    .marvel-content-container {
        position: relative;
        height: 100%;
        display: flex;
        align-items: center;
        z-index: 3;
    }

    @media (max-width: 768px) {
        .marvel-content-container {
            align-items: flex-end;
            padding-bottom: 3.5rem;
        }
    }

    .marvel-content-box {
        max-width: 580px;
        text-align: left;
    }

    .marvel-badge {
        display: inline-block;
        font-family: 'Roboto Condensed', sans-serif;
        font-size: 11px;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 2px;
        color: #ffffff;
        border: 1px solid rgba(255, 255, 255, 0.8);
        padding: 4px 14px;
        margin-bottom: 12px;
        background: rgba(0, 0, 0, 0.3);
        backdrop-filter: blur(4px);
    }

    .marvel-title {
        font-family: 'Roboto Condensed', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
        font-size: clamp(26px, 3.8vw, 46px);
        font-weight: 900;
        line-height: 1.05;
        letter-spacing: -0.5px;
        text-transform: uppercase;
        color: #ffffff;
        margin-bottom: 14px;
        text-shadow: 0 3px 12px rgba(0, 0, 0, 0.85);
    }

    .marvel-desc {
        font-size: 15px;
        line-height: 1.55;
        color: rgba(255, 255, 255, 0.88);
        margin-bottom: 22px;
        max-width: 500px;
        text-shadow: 0 1px 4px rgba(0, 0, 0, 0.7);
    }

    .marvel-btn {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 8px;
        background-color: #e62429;
        color: #ffffff !important;
        font-family: 'Roboto Condensed', sans-serif;
        font-size: 14px;
        font-weight: 800;
        text-transform: uppercase;
        letter-spacing: 1.2px;
        padding: 13px 32px;
        text-decoration: none;
        clip-path: polygon(10px 0, 100% 0, 100% calc(100% - 10px), calc(100% - 10px) 100%, 0 100%, 0 10px);
        transition: background-color 0.2s ease, transform 0.2s ease, box-shadow 0.2s ease;
        border: none;
        cursor: pointer;
    }

    .marvel-btn:hover {
        background-color: #b51a1e;
        transform: translateY(-2px);
        box-shadow: 0 8px 24px rgba(230, 36, 41, 0.45);
        color: #ffffff !important;
    }

    .marvel-arrow {
        position: absolute;
        top: 50%;
        transform: translateY(-50%);
        width: 50px !important;
        height: 50px !important;
        border-radius: 50% !important;
        background-color: rgba(18, 18, 18, 0.75) !important;
        border: 1px solid rgba(255, 255, 255, 0.15) !important;
        color: #ffffff !important;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 18px;
        opacity: 0;
        transition: opacity 0.25s ease, background-color 0.2s ease, transform 0.2s ease;
        z-index: 10;
    }

    .marvel-masthead:hover .marvel-arrow {
        opacity: 1;
    }

    .marvel-arrow-prev {
        left: 1.5rem;
    }

    .marvel-arrow-next {
        right: 1.5rem;
    }

    .marvel-arrow:hover {
        background-color: #e62429 !important;
        transform: translateY(-50%) scale(1.08);
        border-color: rgba(255, 255, 255, 0.5) !important;
    }

    @media (max-width: 768px) {
        .marvel-arrow {
            display: none;
        }
    }

    .marvel-indicators {
        bottom: 1.5rem;
        margin-bottom: 0;
        gap: 6px;
        z-index: 10;
    }

    .marvel-indicators [data-bs-target] {
        width: 20px !important;
        height: 6px !important;
        border-radius: 2px !important;
        border: none !important;
        background-color: rgba(255, 255, 255, 0.4) !important;
        opacity: 1 !important;
        margin: 0 !important;
        padding: 0 !important;
        transition: width 0.3s ease, background-color 0.3s ease;
    }

    .marvel-indicators .active {
        width: 36px !important;
        background-color: #e62429 !important;
    }

    .book-cover {
        aspect-ratio: 3 / 4;
        object-fit: cover;
    }
</style>

<!-- MARVEL OFFICIAL DUAL-TIER NAVBAR -->
<header class="marvel-navbar">
    <!-- Top Bar (52px) -->
    <div class="marvel-nav-top">
        <div class="marvel-nav-top-container">
            <!-- Left Group: Discrete Boxed Cells for LOG IN & SIGN UP or Authenticated User -->
            <div class="marvel-nav-left">
                <button class="marvel-hamburger-btn d-lg-none" type="button" data-bs-toggle="offcanvas" data-bs-target="#marvelMobileMenu" aria-controls="marvelMobileMenu" aria-label="Toggle Menu">
                    <svg aria-hidden="true" height="20" viewBox="0 0 32 32" width="20" xmlns="http://www.w3.org/2000/svg">
                        <path fill="#ffffff" d="M28 24v2.667H4V24h24zm0-9.333v2.667H4v-2.667h24zm0-9.334V8H4V5.333h24z"/>
                    </svg>
                </button>

                @auth
                    <!-- Logged In: Displays Single Box with Username and Authentic Marvel Dropdown Menu -->
                    <div class="dropdown h-100">
                        <a href="#" class="marvel-nav-cell" data-bs-toggle="dropdown" aria-expanded="false">
                            <span class="marvel-user-icon">
                                <svg aria-hidden="true" height="18" viewBox="0 0 24 24" width="18" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <circle cx="12" cy="12" r="10"/>
                                    <circle cx="12" cy="10" r="3.2"/>
                                    <path d="M6.2 18.5a6 6 0 0 1 11.6 0"/>
                                </svg>
                            </span>
                            <span>{{ strtoupper(Auth::user()->name) }}</span>
                        </a>
                        <div class="dropdown-menu marvel-user-dropdown dropdown-menu-dark shadow-lg">
                            <!-- Gold Warning Banner: Email Verification -->
                            <div class="marvel-dropdown-gold">
                                <p>Verify Your Email To Complete Registration.</p>
                                <a href="javascript:void(0)" onclick="alert('Email konfirmasi telah dikirim ulang ke {{ Auth::user()->email }}!')">RESEND CONFIRMATION</a>
                            </div>

                            <!-- Marvel Unlimited Instant Access Banner -->
                            <a href="{{ route('unlimited') }}" class="marvel-dropdown-promo">
                                <svg width="36" height="40" viewBox="0 0 44 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M6 4h10v24c0 3.3 2.7 6 6 6s6-2.7 6-6V4h10v24c0 8.8-7.2 16-16 16S6 36.8 6 28V4z" fill="#0072D2" stroke="#ffffff" stroke-width="2.5"/>
                                    <rect x="1" y="15" width="42" height="15" fill="#e62429"/>
                                    <text x="22" y="26.5" fill="#ffffff" font-family="'Impact', 'Roboto Condensed', sans-serif" font-weight="900" font-size="10.5" text-anchor="middle" letter-spacing="0.5">MARVEL</text>
                                    <text x="22" y="44" fill="#ffffff" font-family="'Roboto Condensed', sans-serif" font-weight="900" font-size="6.5" text-anchor="middle" letter-spacing="0.5">UNLIMITED</text>
                                </svg>
                                <div class="marvel-dropdown-promo-text">
                                    GET INSTANT ACCESS<br>30,000+ DIGITAL COMICS!
                                </div>
                            </a>

                            <!-- Menu Links matching reference image -->
                            <ul class="marvel-dropdown-menu-list">
                                <li><a class="marvel-dropdown-link" href="#koleksi">MY DIGITAL COMICS PURCHASES</a></li>
                                <li><a class="marvel-dropdown-link text-danger" href="{{ route('unlimited') }}">MARVEL UNLIMITED</a></li>
                                <li><a class="marvel-dropdown-link" href="#">HELP/FAQS</a></li>
                                <li><a class="marvel-dropdown-link" href="#">ACCOUNT SETTINGS</a></li>
                                <li>
                                    <form id="marvel-logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                    <button type="button" class="marvel-dropdown-link text-danger" onclick="document.getElementById('marvel-logout-form').submit();">
                                        LOG OUT
                                    </button>
                                </li>
                            </ul>
                        </div>
                    </div>
                @else
                    <!-- Guest: Exactly Two Distinct Boxed Cells Matching media_1789372176949.png -->
                    <!-- Cell 1: LOG IN -->
                    <a href="{{ route('login') }}" class="marvel-nav-cell" title="Log In">
                        <span class="marvel-user-icon">
                            <svg aria-hidden="true" height="18" viewBox="0 0 24 24" width="18" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <circle cx="12" cy="12" r="10"/>
                                <circle cx="12" cy="10" r="3.2"/>
                                <path d="M6.2 18.5a6 6 0 0 1 11.6 0"/>
                            </svg>
                        </span>
                        <span>LOG IN</span>
                    </a>
                    <!-- Cell 2: SIGN UP -->
                    <a href="{{ route('register') }}" class="marvel-nav-cell" title="Sign Up">
                        <span>SIGN UP</span>
                    </a>
                @endauth
            </div>

            <!-- Center: The Iconic Red MARVEL Logo (52px flush) -->
            <a href="{{ route('home') }}" class="marvel-nav-logo" aria-label="Marvel Home">
                <img src="{{ asset('images/marvel-logo.svg') }}" alt="Marvel Logo">
            </a>

            <!-- Right Group: Marvel Unlimited Promo & Search Cells -->
            <div class="marvel-nav-right">
                <a href="{{ route('unlimited') }}" class="marvel-promo-cell">
                    <svg aria-hidden="true" height="26" viewBox="0 0 32 32" width="20" xmlns="http://www.w3.org/2000/svg">
                        <path fill="#fff" d="M22.31 32l3.37-32L1.89 6.85.14 20.47C-.81 27.74 3.12 32 10.22 32h12.09z"/>
                        <path fill="#e62429" d="M16.51 3.68l-1.14.33-2.73 21.87h-1.67c-.95 0-1.59-.75-1.47-1.7l2.34-19.15L2.86 7.6 1.22 20.46c-.85 6.38 2.35 10.39 9.11 10.39H21.3l3.07-29.43-7.86 2.26z"/>
                    </svg>
                    <div class="marvel-promo-copy">
                        <p class="marvel-promo-title">MARVEL UNLIMITED</p>
                        <p class="marvel-promo-sub">SUBSCRIBE</p>
                    </div>
                </a>

                <button class="marvel-search-cell" id="marvelSearchToggle" type="button" aria-label="Search">
                    <svg aria-hidden="true" height="18" viewBox="0 0 32 32" width="18" xmlns="http://www.w3.org/2000/svg">
                        <path fill="currentColor" d="M29.333 27.452l-8.706-8.706c3.196-4.187 2.599-10.135-1.365-13.604s-9.939-3.269-13.664.456a10.006 10.006 0 0013.147 15.029l8.706 8.706 1.882-1.882zM5.38 12.699a7.32 7.32 0 117.319 7.319 7.328 7.328 0 01-7.319-7.319z"/>
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Primary Nav Links Bar (40px) -->
    <nav class="marvel-nav-primary d-none d-lg-flex">
        <ul class="marvel-nav-menu">
            <li class="marvel-nav-item"><a href="#" class="marvel-nav-link">News</a></li>
            <li class="marvel-nav-item"><a href="#koleksi" class="marvel-nav-link active">Comics</a></li>
            <li class="marvel-nav-item"><a href="#" class="marvel-nav-link">Characters</a></li>
            <li class="marvel-nav-item"><a href="#" class="marvel-nav-link">Games</a></li>
            <li class="marvel-nav-item"><a href="#" class="marvel-nav-link">Movies</a></li>
            <li class="marvel-nav-item"><a href="#" class="marvel-nav-link">TV Shows</a></li>
            <li class="marvel-nav-item"><a href="#" class="marvel-nav-link">Videos</a></li>
            <li class="marvel-nav-item"><a href="#" class="marvel-nav-link">More</a></li>
        </ul>
    </nav>

    <!-- Expandable Search Bar Drawer -->
    <div id="marvelSearchBar" class="marvel-search-drawer d-none">
        <div class="container-xl">
            <form action="{{ route('home') }}" method="GET" class="marvel-search-wrap">
                <input type="text" name="q" id="marvelSearchInput" class="marvel-search-input" placeholder="Search Marvel books, comics, characters..." autocomplete="off">
                <button type="submit" class="marvel-search-submit" aria-label="Submit Search">
                    <svg aria-hidden="true" height="18" viewBox="0 0 32 32" width="18" xmlns="http://www.w3.org/2000/svg">
                        <path fill="currentColor" d="M29.333 27.452l-8.706-8.706c3.196-4.187 2.599-10.135-1.365-13.604s-9.939-3.269-13.664.456a10.006 10.006 0 0013.147 15.029l8.706 8.706 1.882-1.882zM5.38 12.699a7.32 7.32 0 117.319 7.319 7.328 7.328 0 01-7.319-7.319z"/>
                    </svg>
                </button>
            </form>
        </div>
    </div>
</header>

@if (session('success'))
    <div class="alert alert-success alert-dismissible fade show rounded-0 mb-0 border-0 text-center py-2" style="background-color: #107c41; color: #ffffff; font-family: 'Roboto Condensed', sans-serif; font-size: 13px; font-weight: 700; letter-spacing: 1px; z-index: 1030; position: relative;" role="alert">
        <i class="fa-solid fa-circle-check me-2"></i> {{ session('success') }}
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="Close" style="padding: 0.75rem;"></button>
    </div>
@endif

<!-- Mobile Offcanvas Menu (Drawer) -->
<div class="offcanvas offcanvas-start text-white" tabindex="-1" id="marvelMobileMenu" aria-labelledby="marvelMobileMenuLabel" style="width: 290px; background-color: #1a1a1a !important;">
    <div class="offcanvas-header border-bottom border-dark d-flex justify-content-between align-items-center py-3">
        @auth
            <div class="d-flex align-items-center gap-2">
                <span class="text-danger">
                    <svg aria-hidden="true" height="20" viewBox="0 0 24 24" width="20" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <circle cx="12" cy="12" r="10"/>
                        <circle cx="12" cy="10" r="3.2"/>
                        <path d="M6.2 18.5a6 6 0 0 1 11.6 0"/>
                    </svg>
                </span>
                <span class="fw-bold text-uppercase" style="font-family: 'Roboto Condensed', sans-serif; letter-spacing: 1px;">{{ Auth::user()->name }}</span>
            </div>
        @else
            <div class="d-flex align-items-center gap-2">
                <a href="{{ route('login') }}" class="text-white text-decoration-none fw-bold" style="font-family: 'Roboto Condensed', sans-serif; font-size: 13px; letter-spacing: 1px;">
                    LOG IN
                </a>
                <span class="text-secondary">|</span>
                <a href="{{ route('register') }}" class="text-danger text-decoration-none fw-bold" style="font-family: 'Roboto Condensed', sans-serif; font-size: 13px; letter-spacing: 1px;">
                    SIGN UP
                </a>
            </div>
        @endauth
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body p-0">
        <ul class="list-unstyled mb-0" style="font-family: 'Roboto Condensed', sans-serif; letter-spacing: 1.2px;">
            <li class="border-bottom border-secondary-subtle">
                <a href="#" class="d-block text-white text-decoration-none px-4 py-3 fw-bold text-uppercase">News</a>
            </li>
            <li class="border-bottom border-secondary-subtle">
                <a href="#koleksi" class="d-block text-danger text-decoration-none px-4 py-3 fw-bold text-uppercase">Comics</a>
            </li>
            <li class="border-bottom border-secondary-subtle">
                <a href="#" class="d-block text-white text-decoration-none px-4 py-3 fw-bold text-uppercase">Characters</a>
            </li>
            <li class="border-bottom border-secondary-subtle">
                <a href="#" class="d-block text-white text-decoration-none px-4 py-3 fw-bold text-uppercase">Games</a>
            </li>
            <li class="border-bottom border-secondary-subtle">
                <a href="#" class="d-block text-white text-decoration-none px-4 py-3 fw-bold text-uppercase">Movies</a>
            </li>
            <li class="border-bottom border-secondary-subtle">
                <a href="#" class="d-block text-white text-decoration-none px-4 py-3 fw-bold text-uppercase">TV Shows</a>
            </li>
            <li class="border-bottom border-secondary-subtle">
                <a href="#" class="d-block text-white text-decoration-none px-4 py-3 fw-bold text-uppercase">Videos</a>
            </li>
            <li class="border-bottom border-secondary-subtle">
                <a href="#" class="d-block text-white text-decoration-none px-4 py-3 fw-bold text-uppercase">More</a>
            </li>
            @auth
                <li class="border-bottom border-secondary-subtle">
                    <button type="button" class="d-block w-100 text-start text-danger text-decoration-none px-4 py-3 fw-bold text-uppercase bg-transparent border-0" onclick="document.getElementById('marvel-logout-form').submit();">
                        <i class="fa-solid fa-right-from-bracket me-2"></i> Log Out
                    </button>
                </li>
            @endauth
        </ul>
        <div class="p-4 mt-2">
            <a href="{{ route('unlimited') }}" class="btn btn-danger w-100 fw-bold text-uppercase py-2" style="background-color: #e62429; border: none; letter-spacing: 1px;">
                Marvel Unlimited
            </a>
        </div>
    </div>
</div>

<!-- MARVEL COMICS MASTHEAD BANNER -->
<div id="marvel-masthead-carousel" class="carousel slide carousel-fade marvel-masthead" data-bs-ride="carousel" data-bs-interval="5000" data-bs-pause="hover">
    <!-- Indicators (Marvel Dash Style) -->
    <div class="carousel-indicators marvel-indicators">
        <button type="button" data-bs-target="#marvel-masthead-carousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
        <button type="button" data-bs-target="#marvel-masthead-carousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
        <button type="button" data-bs-target="#marvel-masthead-carousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
        <button type="button" data-bs-target="#marvel-masthead-carousel" data-bs-slide-to="3" aria-label="Slide 4"></button>
    </div>

    <!-- Inner Slides -->
    <div class="carousel-inner">
        <!-- Slide 1: Anti-Venom -->
        <div class="carousel-item active">
            <div class="marvel-slide">
                <img class="marvel-slide-img" alt="Anti-Venom"
                    src="{{ asset('images/banners/banner1_antivenom.webp') }}"
                    fetchpriority="high">
                <div class="marvel-gradient-overlay"></div>
                <div class="container-xl marvel-content-container">
                    <div class="marvel-content-box">
                        <span class="marvel-badge">Character Close-Up</span>
                        <h1 class="marvel-title">Meet Anti-Venom, Venom's Polar Opposite</h1>
                        <p class="marvel-desc">Jelajahi asal-usul symbiote Anti-Venom dengan kekuatan penyembuh dan perseteruan ikoniknya di semesta Marvel Comics.</p>
                        <a href="#koleksi" class="marvel-btn">
                            <span>Read Now!</span>
                            <i class="fa-solid fa-arrow-right fs-6"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Slide 2: One World Under Doom -->
        <div class="carousel-item">
            <div class="marvel-slide">
                <img class="marvel-slide-img" alt="Doctor Doom and Challengers"
                    src="{{ asset('images/banners/banner2_doom.webp') }}">
                <div class="marvel-gradient-overlay"></div>
                <div class="container-xl marvel-content-container">
                    <div class="marvel-content-box">
                        <span class="marvel-badge">Marvel Spotlight</span>
                        <h1 class="marvel-title">One World Under Doom: A New Era</h1>
                        <p class="marvel-desc">Saksikan kekuasaan mutlak Doctor Doom yang menundukkan dunia serta perlawanan gigih para pahlawan terhebat Marvel.</p>
                        <a href="#koleksi" class="marvel-btn">
                            <span>Explore Doom!</span>
                            <i class="fa-solid fa-arrow-right fs-6"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Slide 3: The Avengers -->
        <div class="carousel-item">
            <div class="marvel-slide">
                <img class="marvel-slide-img" alt="The Avengers"
                    src="{{ asset('images/banners/banner3_avengers.webp') }}">
                <div class="marvel-gradient-overlay"></div>
                <div class="container-xl marvel-content-container">
                    <div class="marvel-content-box">
                        <span class="marvel-badge">Marvel Unlimited</span>
                        <h1 class="marvel-title">The Avengers: Earth's Mightiest Heroes</h1>
                        <p class="marvel-desc">Pertempuran kolosal tim Avengers menghadapi ancaman kosmik untuk melindungi seluruh eksistensi multiverse.</p>
                        <a href="{{ route('unlimited') }}" class="marvel-btn">
                            <span>Read on Unlimited!</span>
                            <i class="fa-solid fa-arrow-right fs-6"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Slide 4: X-Men Krakoa -->
        <div class="carousel-item">
            <div class="marvel-slide">
                <img class="marvel-slide-img" alt="X-Men: From The Ashes"
                    src="{{ asset('images/banners/banner4_xmen.webp') }}">
                <div class="marvel-gradient-overlay"></div>
                <div class="container-xl marvel-content-container">
                    <div class="marvel-content-box">
                        <span class="marvel-badge">Mutant Destiny</span>
                        <h1 class="marvel-title">X-Men: From The Ashes</h1>
                        <p class="marvel-desc">Era baru bangsa mutan di bawah pimpinan Cyclops dan Storm. Bangkit dari abu demi kelangsungan hidup generasi mutan.</p>
                        <a href="#koleksi" class="marvel-btn">
                            <span>Read Series!</span>
                            <i class="fa-solid fa-arrow-right fs-6"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Marvel Circular Navigation Arrows -->
    <button class="carousel-control-prev marvel-arrow marvel-arrow-prev" type="button" data-bs-target="#marvel-masthead-carousel" data-bs-slide="prev" aria-label="Previous Slide">
        <i class="fa-solid fa-chevron-left"></i>
    </button>
    <button class="carousel-control-next marvel-arrow marvel-arrow-next" type="button" data-bs-target="#marvel-masthead-carousel" data-bs-slide="next" aria-label="Next Slide">
        <i class="fa-solid fa-chevron-right"></i>
    </button>
</div>

<!-- PAKET LANGGANAN MARVEL UNLIMITED -->
<section class="container-xl mt-5" id="langganan">
    <div class="d-flex align-items-center justify-content-between mb-4">
        <div>
            <span class="text-danger fw-bold text-uppercase" style="font-family: 'Roboto Condensed', sans-serif; font-size: 12px; letter-spacing: 1.5px;">Marvel Unlimited</span>
            <h2 class="m-0 text-white" style="font-family: 'Roboto Condensed', sans-serif; font-weight: 800; letter-spacing: 0.5px;">Paket Langganan</h2>
        </div>
        <a href="{{ route('unlimited') }}" class="btn btn-sm text-uppercase fw-bold text-danger" style="font-family: 'Roboto Condensed', sans-serif; letter-spacing: 1px;">
            Buka Halaman Unlimited <i class="fa-solid fa-arrow-right ms-1"></i>
        </a>
    </div>

    <div class="row row-cards g-4">
        <div class="col-12 col-md-4">
            <article class="card h-100 bg-dark text-white border-secondary">
                <div class="card-body d-flex flex-column justify-content-between p-4">
                    <div>
                        <h3 class="card-title text-uppercase" style="font-family: 'Roboto Condensed', sans-serif; font-weight: 800;">Monthly</h3>
                        <p class="text-secondary" style="font-size: 13px;">Akses penuh ke 30.000+ komik digital, rilis mingguan terbaru, baca offline di iOS dan Android.</p>
                        <div class="my-3">
                            <span class="h2 fw-bold text-white">Rp 149.000</span>
                            <span class="text-secondary">/ bln</span>
                        </div>
                    </div>
                    <form action="{{ route('unlimited.subscribe', 1) }}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-outline-light w-100 fw-bold text-uppercase py-2" style="font-family: 'Roboto Condensed', sans-serif; letter-spacing: 1px;">Pilih Bulanan</button>
                    </form>
                </div>
            </article>
        </div>

        <div class="col-12 col-md-4">
            <article class="card h-100 bg-dark text-white border-danger" style="box-shadow: 0 0 25px rgba(230, 36, 41, 0.3);">
                <div class="card-body d-flex flex-column justify-content-between position-relative p-4">
                    <span class="badge bg-danger position-absolute top-0 end-0 m-3 text-uppercase" style="font-family: 'Roboto Condensed', sans-serif; font-size: 10px; letter-spacing: 1px;">Best Value</span>
                    <div>
                        <h3 class="card-title text-uppercase text-danger" style="font-family: 'Roboto Condensed', sans-serif; font-weight: 800;">Annual</h3>
                        <p class="text-secondary" style="font-size: 13px;">Hemat >40% dibanding bulanan, termasuk 7-day free trial, dan akses Infinity Comics eksklusif.</p>
                        <div class="my-3">
                            <span class="h2 fw-bold text-danger">Rp 999.000</span>
                            <span class="text-secondary">/ thn</span>
                            <div class="text-warning small fw-bold mt-1">~Rp 83.250/bulan</div>
                        </div>
                    </div>
                    <form action="{{ route('unlimited.subscribe', 2) }}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-danger w-100 fw-bold text-uppercase py-2" style="background-color: #e62429; border: none; font-family: 'Roboto Condensed', sans-serif; letter-spacing: 1px;">Mulai Uji Coba 7 Hari</button>
                    </form>
                </div>
            </article>
        </div>

        <div class="col-12 col-md-4">
            <article class="card h-100 bg-dark text-white" style="border: 1px solid #e5a823;">
                <div class="card-body d-flex flex-column justify-content-between position-relative p-4">
                    <span class="badge position-absolute top-0 end-0 m-3 text-uppercase" style="background-color: #e5a823; color: #000; font-family: 'Roboto Condensed', sans-serif; font-size: 10px; letter-spacing: 1px;">Membership Kit</span>
                    <div>
                        <h3 class="card-title text-uppercase" style="color: #e5a823; font-family: 'Roboto Condensed', sans-serif; font-weight: 800;">Annual Plus</h3>
                        <p class="text-secondary" style="font-size: 13px;">Termasuk box fisik: Action figure Marvel Legends eksklusif, 2 komik varian, pin, patch & diskon Disney Store.</p>
                        <div class="my-3">
                            <span class="h2 fw-bold" style="color: #e5a823;">Rp 1.499.000</span>
                            <span class="text-secondary">/ thn</span>
                        </div>
                    </div>
                    <form action="{{ route('unlimited.subscribe', 3) }}" method="POST">
                        @csrf
                        <button type="submit" class="btn w-100 fw-bold text-uppercase py-2" style="background-color: #e5a823; color: #000; font-family: 'Roboto Condensed', sans-serif; letter-spacing: 1px;">Gabung Annual Plus</button>
                    </form>
                </div>
            </article>
        </div>
    </div>
</section>

<section class="container-xl mt-5" id="koleksi">
    <div class="d-flex align-items-center justify-content-between mb-3">
        <h2 class="m-0 text-dark">Buku pilihan</h2>
        <span class="text-secondary">{{ $books->count() }} buku</span>
    </div>

    @forelse ($books as $book)
        @if ($loop->first)
            <div class="row row-cards">
        @endif
                <div class="col-6 col-md-4 col-lg-3">
                    <article class="card h-100">
                        <img class="card-img-top book-cover" src="{{ $book->cover }}" alt="Cover {{ $book->title }}">
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
            <p class="empty-title">Belum ada buku</p>
            <p class="empty-subtitle text-secondary">Data buku akan tampil di sini setelah ditambahkan.</p>
        </div>
    @endforelse
</section>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const searchToggle = document.getElementById('marvelSearchToggle');
        const searchBar = document.getElementById('marvelSearchBar');
        const searchInput = document.getElementById('marvelSearchInput');

        if (searchToggle && searchBar) {
            searchToggle.addEventListener('click', function () {
                searchBar.classList.toggle('d-none');
                if (!searchBar.classList.contains('d-none') && searchInput) {
                    searchInput.focus();
                }
            });
        }
    });
</script>
@endsection

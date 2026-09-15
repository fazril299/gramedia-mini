@extends('layouts.app')

@section('content')
<style>
    /* Marvel Red Scrollbar */
    html {
        scrollbar-color: #e62429 #111111;
        scrollbar-width: thin;
        scroll-behavior: smooth;
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

    body {
        background-color: #0d0d0d;
        color: #ffffff;
        font-family: 'Roboto', sans-serif;
    }

    /* ===================================================
       OFFICIAL MARVEL DUAL-TIER NAVBAR (Full-Width)
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
        border-left: none;
    }

    .marvel-nav-cell:hover {
        color: #e62429 !important;
        background-color: rgba(255, 255, 255, 0.03);
    }

    .marvel-nav-cell::after {
        display: none !important;
    }

    .marvel-user-icon {
        width: 18px;
        height: 18px;
        display: inline-flex;
        align-items: center;
        justify-content: center;
    }

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

    /* Marvel Dropdown */
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
        .marvel-promo-cell {
            display: none;
        }
    }

    /* ===================================================
       HERO SELLPAGE SECTION
       =================================================== */
    .unlimited-hero {
        position: relative;
        min-height: 520px;
        background-color: #0b0c10;
        background-image: 
            radial-gradient(circle at 75% 30%, rgba(230, 36, 41, 0.22) 0%, transparent 60%),
            linear-gradient(to bottom, rgba(11, 12, 16, 0.4) 0%, rgba(11, 12, 16, 0.95) 100%),
            url("https://wallpapers.com/images/featured/marvel-comic-strip-010419h08jffu0n5.jpg");
        background-size: cover;
        background-position: center;
        display: flex;
        align-items: center;
        padding: 4.5rem 0;
        overflow: hidden;
        border-bottom: 2px solid #222222;
    }

    .unlimited-hero::before {
        content: '';
        position: absolute;
        top: 0; left: 0; right: 0; bottom: 0;
        background: linear-gradient(90deg, #0b0c10 25%, rgba(11, 12, 16, 0.85) 65%, rgba(11, 12, 16, 0.4) 100%);
        z-index: 1;
    }

    .unlimited-hero-content {
        position: relative;
        z-index: 2;
        max-width: 720px;
    }

    .unlimited-badge {
        display: inline-flex;
        align-items: center;
        gap: 10px;
        background: rgba(230, 36, 41, 0.15);
        border: 1px solid rgba(230, 36, 41, 0.4);
        padding: 6px 14px;
        border-radius: 4px;
        margin-bottom: 1.25rem;
    }

    .unlimited-badge-text {
        font-family: 'Roboto Condensed', sans-serif;
        font-weight: 900;
        font-size: 13px;
        letter-spacing: 1.5px;
        color: #e62429;
        text-transform: uppercase;
    }

    .unlimited-hero-title {
        font-family: 'Roboto Condensed', sans-serif;
        font-weight: 900;
        font-size: clamp(2.4rem, 5vw, 3.8rem);
        line-height: 1.05;
        letter-spacing: 0.5px;
        text-transform: uppercase;
        color: #ffffff;
        margin-bottom: 1.25rem;
    }

    .unlimited-hero-title span {
        color: #e62429;
    }

    .unlimited-hero-desc {
        font-size: 1.1rem;
        line-height: 1.6;
        color: #cccccc;
        margin-bottom: 2rem;
        max-width: 640px;
    }

    .marvel-btn-cut {
        display: inline-flex;
        align-items: center;
        gap: 10px;
        background-color: #e62429;
        color: #ffffff !important;
        font-family: 'Roboto Condensed', sans-serif;
        font-size: 14px;
        font-weight: 900;
        letter-spacing: 1.5px;
        text-transform: uppercase;
        padding: 14px 34px;
        text-decoration: none !important;
        clip-path: polygon(10px 0, 100% 0, 100% calc(100% - 10px), calc(100% - 10px) 100%, 0 100%, 0 10px);
        transition: background-color 0.2s ease, transform 0.2s ease, box-shadow 0.2s ease;
        border: none;
        cursor: pointer;
    }

    .marvel-btn-cut:hover {
        background-color: #b51a1e;
        transform: translateY(-2px);
        box-shadow: 0 10px 30px rgba(230, 36, 41, 0.45);
    }

    .marvel-btn-secondary {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        background: rgba(255, 255, 255, 0.08);
        color: #ffffff !important;
        font-family: 'Roboto Condensed', sans-serif;
        font-size: 14px;
        font-weight: 800;
        letter-spacing: 1px;
        text-transform: uppercase;
        padding: 14px 28px;
        border: 1px solid rgba(255, 255, 255, 0.2);
        text-decoration: none !important;
        transition: background-color 0.2s ease, border-color 0.2s ease;
    }

    .marvel-btn-secondary:hover {
        background: rgba(255, 255, 255, 0.15);
        border-color: #ffffff;
    }

    /* ===================================================
       PRICING TIERS SECTION
       =================================================== */
    .plans-section {
        padding: 5rem 0 6rem 0;
        background-color: #111111;
        position: relative;
    }

    .section-header {
        text-align: center;
        max-width: 700px;
        margin: 0 auto 3.5rem auto;
    }

    .section-subtitle {
        font-family: 'Roboto Condensed', sans-serif;
        font-weight: 800;
        font-size: 12px;
        letter-spacing: 2px;
        color: #e62429;
        text-transform: uppercase;
        margin-bottom: 0.5rem;
    }

    .section-title {
        font-family: 'Roboto Condensed', sans-serif;
        font-weight: 900;
        font-size: 32px;
        letter-spacing: 1px;
        text-transform: uppercase;
        color: #ffffff;
        margin-bottom: 0.75rem;
    }

    .section-desc {
        color: #999999;
        font-size: 15px;
    }

    .pricing-card {
        background-color: #181818;
        border: 1px solid #282828;
        border-radius: 4px;
        padding: 2.25rem 2rem;
        height: 100%;
        display: flex;
        flex-direction: column;
        justify-content: space-between;
        position: relative;
        transition: transform 0.25s ease, box-shadow 0.25s ease, border-color 0.25s ease;
    }

    .pricing-card:hover {
        transform: translateY(-6px);
        box-shadow: 0 20px 40px rgba(0, 0, 0, 0.7);
        border-color: #444444;
    }

    .pricing-card.featured {
        background-color: #1a1a1a;
        border: 2px solid #e62429;
        box-shadow: 0 10px 40px rgba(230, 36, 41, 0.25);
    }

    .pricing-card.featured:hover {
        box-shadow: 0 20px 50px rgba(230, 36, 41, 0.4);
    }

    .pricing-card.plus {
        border: 1px solid #c9931b;
        background: linear-gradient(180deg, #1f1a14 0%, #171717 100%);
    }

    .plan-pill {
        position: absolute;
        top: -14px;
        left: 50%;
        transform: translateX(-50%);
        font-family: 'Roboto Condensed', sans-serif;
        font-size: 11px;
        font-weight: 900;
        letter-spacing: 1px;
        text-transform: uppercase;
        padding: 5px 16px;
        border-radius: 20px;
        white-space: nowrap;
    }

    .plan-pill-red {
        background-color: #e62429;
        color: #ffffff;
        box-shadow: 0 4px 15px rgba(230, 36, 41, 0.5);
    }

    .plan-pill-gold {
        background-color: #e5a823;
        color: #000000;
        box-shadow: 0 4px 15px rgba(229, 168, 35, 0.4);
    }

    .plan-name {
        font-family: 'Roboto Condensed', sans-serif;
        font-weight: 900;
        font-size: 22px;
        letter-spacing: 1px;
        text-transform: uppercase;
        color: #ffffff;
        margin-bottom: 0.5rem;
    }

    .plan-price-wrap {
        margin: 1rem 0 1.25rem 0;
        padding-bottom: 1.25rem;
        border-bottom: 1px solid #282828;
    }

    .plan-price {
        font-family: 'Roboto Condensed', sans-serif;
        font-weight: 900;
        font-size: 34px;
        color: #ffffff;
        line-height: 1;
    }

    .plan-period {
        font-size: 13px;
        color: #888888;
        font-weight: 500;
    }

    .plan-subtext {
        font-size: 12px;
        color: #aaaaaa;
        margin-top: 4px;
    }

    .plan-features {
        list-style: none;
        padding: 0;
        margin: 0 0 2rem 0;
        flex-grow: 1;
    }

    .plan-features li {
        display: flex;
        align-items: flex-start;
        gap: 10px;
        font-size: 13px;
        color: #cccccc;
        margin-bottom: 12px;
        line-height: 1.4;
    }

    .plan-features li i {
        color: #e62429;
        font-size: 14px;
        margin-top: 2px;
    }

    .plan-features.plus-features li i {
        color: #e5a823;
    }

    /* ===================================================
       CORE APP FEATURES SECTION ("READ ANYWHERE")
       =================================================== */
    .features-section {
        padding: 6rem 0;
        background-color: #0d0d0d;
        border-top: 1px solid #1f1f1f;
        border-bottom: 1px solid #1f1f1f;
    }

    .feature-card {
        background-color: #151515;
        border: 1px solid #262626;
        padding: 2.25rem 1.75rem;
        height: 100%;
        border-radius: 4px;
        transition: transform 0.2s ease, border-color 0.2s ease;
    }

    .feature-card:hover {
        transform: translateY(-4px);
        border-color: #e62429;
    }

    .feature-icon-box {
        width: 52px;
        height: 52px;
        background-color: rgba(230, 36, 41, 0.12);
        border: 1px solid rgba(230, 36, 41, 0.3);
        border-radius: 6px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 22px;
        color: #e62429;
        margin-bottom: 1.5rem;
    }

    .feature-title {
        font-family: 'Roboto Condensed', sans-serif;
        font-weight: 800;
        font-size: 18px;
        letter-spacing: 0.8px;
        text-transform: uppercase;
        color: #ffffff;
        margin-bottom: 0.75rem;
    }

    .feature-text {
        font-size: 14px;
        color: #999999;
        line-height: 1.6;
        margin-bottom: 0;
    }

    /* ===================================================
       MEMBERSHIP KIT SECTION
       =================================================== */
    .kit-section {
        padding: 5rem 0;
        background-color: #141414;
        background-image: radial-gradient(circle at 20% 50%, rgba(229, 168, 35, 0.1) 0%, transparent 50%);
        border-bottom: 1px solid #222222;
    }

    .kit-badge {
        font-family: 'Roboto Condensed', sans-serif;
        font-weight: 900;
        font-size: 11px;
        letter-spacing: 1.5px;
        color: #e5a823;
        text-transform: uppercase;
        background: rgba(229, 168, 35, 0.12);
        border: 1px solid rgba(229, 168, 35, 0.4);
        padding: 5px 12px;
        display: inline-block;
        border-radius: 3px;
        margin-bottom: 1rem;
    }

    .kit-title {
        font-family: 'Roboto Condensed', sans-serif;
        font-weight: 900;
        font-size: 30px;
        letter-spacing: 1px;
        text-transform: uppercase;
        color: #ffffff;
        margin-bottom: 1rem;
    }

    .kit-item-row {
        display: flex;
        align-items: center;
        gap: 12px;
        margin-bottom: 12px;
        color: #dddddd;
        font-size: 14px;
    }

    .kit-item-row i {
        color: #e5a823;
        font-size: 16px;
    }

    /* ===================================================
       FAQ ACCORDION SECTION
       =================================================== */
    .faq-section {
        padding: 6rem 0;
        background-color: #0f0f0f;
    }

    .marvel-accordion .accordion-item {
        background-color: #171717;
        border: 1px solid #282828;
        margin-bottom: 12px;
        border-radius: 4px !important;
        overflow: hidden;
    }

    .marvel-accordion .accordion-button {
        background-color: #171717;
        color: #ffffff;
        font-family: 'Roboto Condensed', sans-serif;
        font-weight: 700;
        font-size: 16px;
        letter-spacing: 0.5px;
        box-shadow: none;
        padding: 18px 22px;
    }

    .marvel-accordion .accordion-button:not(.collapsed) {
        background-color: #1f1f1f;
        color: #e62429;
        border-bottom: 1px solid #282828;
    }

    .marvel-accordion .accordion-button::after {
        filter: invert(1);
    }

    .marvel-accordion .accordion-body {
        background-color: #141414;
        color: #aaaaaa;
        font-size: 14px;
        line-height: 1.7;
        padding: 20px 22px;
    }

    /* ===================================================
       FINAL CTA BANNER
       =================================================== */
    .final-cta-section {
        background: linear-gradient(135deg, #b51a1e 0%, #e62429 50%, #850c10 100%);
        padding: 4.5rem 0;
        text-align: center;
        position: relative;
        overflow: hidden;
    }

    .final-cta-title {
        font-family: 'Roboto Condensed', sans-serif;
        font-weight: 900;
        font-size: clamp(2rem, 4vw, 3rem);
        letter-spacing: 1px;
        text-transform: uppercase;
        color: #ffffff;
        margin-bottom: 0.75rem;
    }

    .final-cta-desc {
        font-size: 1.1rem;
        color: rgba(255, 255, 255, 0.9);
        max-width: 600px;
        margin: 0 auto 2rem auto;
    }

    .final-btn-white {
        background-color: #ffffff;
        color: #111111 !important;
        font-family: 'Roboto Condensed', sans-serif;
        font-size: 14px;
        font-weight: 900;
        letter-spacing: 1.5px;
        text-transform: uppercase;
        padding: 14px 38px;
        text-decoration: none !important;
        clip-path: polygon(10px 0, 100% 0, 100% calc(100% - 10px), calc(100% - 10px) 100%, 0 100%, 0 10px);
        transition: background-color 0.2s, transform 0.2s, box-shadow 0.2s;
        display: inline-block;
        border: none;
    }

    .final-btn-white:hover {
        background-color: #f0f0f0;
        transform: translateY(-2px);
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.4);
    }
</style>

<!-- MARVEL OFFICIAL DUAL-TIER NAVBAR (Full-Width) -->
<header class="marvel-navbar">
    <div class="marvel-nav-top">
        <div class="marvel-nav-top-container">
            <!-- Left Group: LOG IN & SIGN UP / Auth Cell -->
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
                            <div class="marvel-dropdown-gold">
                                <p>Verify Your Email To Complete Registration.</p>
                                <a href="javascript:void(0)" onclick="alert('Email konfirmasi telah dikirim ulang ke {{ Auth::user()->email }}!')">RESEND CONFIRMATION</a>
                            </div>

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

                            <ul class="marvel-dropdown-menu-list">
                                <li><a class="marvel-dropdown-link" href="{{ route('home') }}#koleksi">MY DIGITAL COMICS PURCHASES</a></li>
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
                    <a href="{{ route('register') }}" class="marvel-nav-cell" title="Sign Up">
                        <span>SIGN UP</span>
                    </a>
                @endauth
            </div>

            <!-- Center: The Iconic Red MARVEL Logo -->
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

    <!-- Subnav Primary Menu -->
    <nav class="marvel-nav-primary d-none d-lg-flex">
        <ul class="marvel-nav-menu">
            <li class="marvel-nav-item"><a href="{{ route('home') }}" class="marvel-nav-link">Home</a></li>
            <li class="marvel-nav-item"><a href="{{ route('home') }}#koleksi" class="marvel-nav-link">Comics</a></li>
            <li class="marvel-nav-item"><a href="{{ route('unlimited') }}" class="marvel-nav-link active">Unlimited</a></li>
            <li class="marvel-nav-item"><a href="#" class="marvel-nav-link">Characters</a></li>
            <li class="marvel-nav-item"><a href="#" class="marvel-nav-link">Games</a></li>
            <li class="marvel-nav-item"><a href="#" class="marvel-nav-link">Movies</a></li>
            <li class="marvel-nav-item"><a href="#" class="marvel-nav-link">TV Shows</a></li>
            <li class="marvel-nav-item"><a href="#" class="marvel-nav-link">More</a></li>
        </ul>
    </nav>
</header>

@if (session('success'))
    <div class="alert alert-success alert-dismissible fade show rounded-0 mb-0 border-0 text-center py-2" style="background-color: #107c41; color: #ffffff; font-family: 'Roboto Condensed', sans-serif; font-size: 13px; font-weight: 700; letter-spacing: 1px;" role="alert">
        <i class="fa-solid fa-circle-check me-2"></i> {{ session('success') }}
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="Close" style="padding: 0.75rem;"></button>
    </div>
@endif

@if (session('error'))
    <div class="alert alert-danger alert-dismissible fade show rounded-0 mb-0 border-0 text-center py-2" style="background-color: #b51a1e; color: #ffffff; font-family: 'Roboto Condensed', sans-serif; font-size: 13px; font-weight: 700; letter-spacing: 1px;" role="alert">
        <i class="fa-solid fa-triangle-exclamation me-2"></i> {{ session('error') }}
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="Close" style="padding: 0.75rem;"></button>
    </div>
@endif

<!-- Active Subscription Notice (if user already subscribed) -->
@if ($activeSubscription)
    <div class="py-3 px-4 text-center" style="background-color: #1f1807; border-bottom: 1px solid #e5a823;">
        <div class="container-xl d-flex flex-wrap align-items-center justify-content-center gap-3">
            <span class="badge" style="background-color: #e5a823; color: #000; font-family: 'Roboto Condensed', sans-serif; font-size: 12px; font-weight: 900; letter-spacing: 1px;">PAKET AKTIF</span>
            <span class="text-white" style="font-size: 14px;">
                Anda saat ini sedang berlangganan <strong>{{ $activeSubscription->subscriptionPackage->name_package ?? 'Marvel Unlimited' }}</strong> hingga tanggal <strong>{{ \Carbon\Carbon::parse($activeSubscription->expired_date)->translatedFormat('d F Y') }}</strong>.
            </span>
            <a href="{{ route('home') }}#koleksi" class="btn btn-sm btn-outline-light text-uppercase fw-bold" style="font-family: 'Roboto Condensed', sans-serif; font-size: 11px; letter-spacing: 1px;">Mulai Baca Komik</a>
        </div>
    </div>
@endif

<!-- HERO SECTION -->
<section class="unlimited-hero">
    <div class="container-xl">
        <div class="unlimited-hero-content">
            <div class="unlimited-badge">
                <svg width="20" height="22" viewBox="0 0 44 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M6 4h10v24c0 3.3 2.7 6 6 6s6-2.7 6-6V4h10v24c0 8.8-7.2 16-16 16S6 36.8 6 28V4z" fill="#0072D2" stroke="#ffffff" stroke-width="2.5"/>
                    <rect x="1" y="15" width="42" height="15" fill="#e62429"/>
                    <text x="22" y="26.5" fill="#ffffff" font-family="'Impact', 'Roboto Condensed', sans-serif" font-weight="900" font-size="10.5" text-anchor="middle" letter-spacing="0.5">MARVEL</text>
                    <text x="22" y="44" fill="#ffffff" font-family="'Roboto Condensed', sans-serif" font-weight="900" font-size="6.5" text-anchor="middle" letter-spacing="0.5">UNLIMITED</text>
                </svg>
                <span class="unlimited-badge-text">Marvel Unlimited</span>
            </div>

            <h1 class="unlimited-hero-title">
                OVER 30,000 DIGITAL COMICS.<br>
                <span>ONE ALL-NEW APP.</span>
            </h1>

            <p class="unlimited-hero-desc">
                Dapatkan akses instan ke perpustakaan komik legendaris Marvel dengan satu harga terjangkau! Jelajahi lebih dari 30.000 komik yang mencakup 85 tahun sejarah Marvel. Temukan kisah pahlawan favoritmu, crossover blockbuster, dan serial Infinity Comics eksklusif.
            </p>

            <div class="d-flex flex-wrap gap-3 align-items-center">
                <a href="#plans" class="marvel-btn-cut">
                    <span>PILIH PAKET LANGGANAN</span>
                    <i class="fa-solid fa-arrow-down fs-6"></i>
                </a>
                <a href="#features" class="marvel-btn-secondary">
                    <span>LIHAT FITUR APLIKASI</span>
                </a>
            </div>
        </div>
    </div>
</section>

<!-- PRICING TIERS SECTION -->
<section class="plans-section" id="plans">
    <div class="container-xl">
        <div class="section-header">
            <p class="section-subtitle">PILIHAN PAKET LANGGANAN</p>
            <h2 class="section-title">PILIH PAKET SESUAI KEBUTUHANMU</h2>
            <p class="section-desc">Nikmati kebebasan membaca ribuan komik Marvel di seluruh perangkatmu. Batalkan kapan saja tanpa komitmen jangka panjang.</p>
        </div>

        <div class="row g-4 align-items-stretch">
            <!-- 1. MONTHLY PLAN -->
            <div class="col-12 col-md-4">
                <div class="pricing-card">
                    <div>
                        <h3 class="plan-name">MONTHLY</h3>
                        <p class="text-secondary mb-0" style="font-size: 13px;">Fleksibel & hemat untuk pembaca kasual</p>
                        
                        <div class="plan-price-wrap">
                            <div class="d-flex align-items-baseline gap-1">
                                <span class="plan-price">Rp 149.000</span>
                                <span class="plan-period">/ bulan</span>
                            </div>
                            <div class="plan-subtext">Setara $9.99/mo • Ditagih bulanan</div>
                        </div>

                        <ul class="plan-features">
                            <li><i class="fa-solid fa-check"></i> Akses tanpa batas ke 30.000+ komik digital</li>
                            <li><i class="fa-solid fa-check"></i> Terbitan baru ditambah setiap minggu (3 bulan setelah rilis cetak)</li>
                            <li><i class="fa-solid fa-check"></i> Unduh komik untuk dibaca secara offline</li>
                            <li><i class="fa-solid fa-check"></i> Akses aplikasi di iOS, Android, dan Web Reader</li>
                            <li><i class="fa-solid fa-check"></i> Mode Smart Panels untuk pengalaman baca terpandu</li>
                        </ul>
                    </div>

                    <div>
                        <form action="{{ route('unlimited.subscribe', 1) }}" method="POST">
                            @csrf
                            <button type="submit" class="marvel-btn-cut w-100 justify-content-center">
                                GABUNG BULANAN
                            </button>
                        </form>
                    </div>
                </div>
            </div>

            <!-- 2. ANNUAL PLAN (FEATURED - BEST VALUE) -->
            <div class="col-12 col-md-4">
                <div class="pricing-card featured">
                    <div class="plan-pill plan-pill-red">
                        <i class="fa-solid fa-bolt me-1"></i> BEST VALUE — HEMAT >40%
                    </div>

                    <div>
                        <h3 class="plan-name text-danger">ANNUAL</h3>
                        <p class="text-secondary mb-0" style="font-size: 13px;">Pilihan terpopuler pecinta komik Marvel</p>
                        
                        <div class="plan-price-wrap">
                            <div class="d-flex align-items-baseline gap-1">
                                <span class="plan-price text-danger">Rp 999.000</span>
                                <span class="plan-period">/ tahun</span>
                            </div>
                            <div class="plan-subtext text-warning fw-bold">Hanya ~Rp 83.250/bulan (Setara $69.00/thn)</div>
                        </div>

                        <ul class="plan-features">
                            <li class="fw-bold text-white"><i class="fa-solid fa-gift text-warning"></i> Termasuk 7 Hari Uji Coba Gratis (Free Trial)</li>
                            <li><i class="fa-solid fa-check"></i> <strong>Semua fitur di Paket Bulanan</strong></li>
                            <li><i class="fa-solid fa-check"></i> Akses serial komik vertikal <em>Infinity Comics</em> eksklusif</li>
                            <li><i class="fa-solid fa-check"></i> Hemat lebih dari Rp 789.000 dibandingkan bayar bulanan</li>
                            <li><i class="fa-solid fa-check"></i> Pengalaman membaca tanpa gangguan iklan selamanya</li>
                        </ul>
                    </div>

                    <div>
                        <form action="{{ route('unlimited.subscribe', 2) }}" method="POST">
                            @csrf
                            <button type="submit" class="marvel-btn-cut w-100 justify-content-center" style="box-shadow: 0 8px 25px rgba(230, 36, 41, 0.6);">
                                MULAI UJI COBA 7 HARI <i class="fa-solid fa-arrow-right ms-1"></i>
                            </button>
                        </form>
                    </div>
                </div>
            </div>

            <!-- 3. ANNUAL PLUS (COLLECTOR MEMBERSHIP KIT) -->
            <div class="col-12 col-md-4">
                <div class="pricing-card plus">
                    <div class="plan-pill plan-pill-gold">
                        <i class="fa-solid fa-crown me-1"></i> EXCLUSIVE MEMBERSHIP KIT
                    </div>

                    <div>
                        <h3 class="plan-name" style="color: #e5a823;">ANNUAL PLUS</h3>
                        <p class="text-secondary mb-0" style="font-size: 13px;">Untuk kolektor & fans garis keras Marvel</p>
                        
                        <div class="plan-price-wrap">
                            <div class="d-flex align-items-baseline gap-1">
                                <span class="plan-price" style="color: #e5a823;">Rp 1.499.000</span>
                                <span class="plan-period">/ tahun</span>
                            </div>
                            <div class="plan-subtext">Setara $99.00/thn • Termasuk Paket Merchandise Fisik</div>
                        </div>

                        <ul class="plan-features plus-features">
                            <li><i class="fa-solid fa-check"></i> <strong>Semua fitur di Paket Annual</strong></li>
                            <li class="text-white fw-bold"><i class="fa-solid fa-star"></i> <strong>Action Figure Marvel Legends Eksklusif</strong></li>
                            <li class="text-white fw-bold"><i class="fa-solid fa-star"></i> <strong>2 Komik Varian Langka</strong> (Hanya untuk member Plus)</li>
                            <li><i class="fa-solid fa-check"></i> Pin & Patch bordir resmi Marvel Unlimited</li>
                            <li><i class="fa-solid fa-check"></i> <strong>Diskon 10%</strong> belanja di Disney Store</li>
                            <li><i class="fa-solid fa-check"></i> Undangan eksklusif acara & panel komik Marvel</li>
                        </ul>
                    </div>

                    <div>
                        <form action="{{ route('unlimited.subscribe', 3) }}" method="POST">
                            @csrf
                            <button type="submit" class="marvel-btn-cut w-100 justify-content-center" style="background-color: #e5a823; color: #000000 !important;">
                                GABUNG ANNUAL PLUS
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- CORE APP FEATURES ("READ ANYWHERE, ANYTIME") -->
<section class="features-section" id="features">
    <div class="container-xl">
        <div class="section-header">
            <p class="section-subtitle">FITUR UNGGULAN APLIKASI</p>
            <h2 class="section-title">BACA KAPAN SAJA, DI MANA SAJA</h2>
            <p class="section-desc">Aplikasi Marvel Unlimited dirancang dari awal untuk memberikan pengalaman membaca komik digital terbaik.</p>
        </div>

        <div class="row g-4">
            <div class="col-12 col-md-6 col-lg-3">
                <div class="feature-card">
                    <div class="feature-icon-box">
                        <i class="fa-solid fa-mobile-screen-button"></i>
                    </div>
                    <h4 class="feature-title">Infinity Comics</h4>
                    <p class="feature-text">Format komik vertikal inovatif yang didesain khusus untuk layar ponsel, menghadirkan kisah orisinal dari kreator top Marvel.</p>
                </div>
            </div>

            <div class="col-12 col-md-6 col-lg-3">
                <div class="feature-card">
                    <div class="feature-icon-box">
                        <i class="fa-solid fa-book-open"></i>
                    </div>
                    <h4 class="feature-title">30.000+ Komik</h4>
                    <p class="feature-text">Katalog raksasa dari era klasik Stan Lee & Jack Kirby 1960-an hingga event modern seperti Secret Wars, Krakoa, dan Civil War.</p>
                </div>
            </div>

            <div class="col-12 col-md-6 col-lg-3">
                <div class="feature-card">
                    <div class="feature-icon-box">
                        <i class="fa-solid fa-cloud-arrow-down"></i>
                    </div>
                    <h4 class="feature-title">Unduh & Baca Offline</h4>
                    <p class="feature-text">Simpan hingga puluhan edisi komik ke perangkat Anda. Baca dengan nyaman di pesawat, perjalanan, atau saat tanpa koneksi internet.</p>
                </div>
            </div>

            <div class="col-12 col-md-6 col-lg-3">
                <div class="feature-card">
                    <div class="feature-icon-box">
                        <i class="fa-solid fa-compass"></i>
                    </div>
                    <h4 class="feature-title">Panduan Membaca</h4>
                    <p class="feature-text">Ikuti rute dan urutan baca resmi yang dikurasi oleh para editor Marvel untuk Spider-Man, Avengers, X-Men, dan Deadpool.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- MEMBERSHIP KIT SPOTLIGHT -->
<section class="kit-section">
    <div class="container-xl">
        <div class="row align-items-center g-5">
            <div class="col-12 col-lg-6">
                <span class="kit-badge">ANNUAL PLUS EXCLUSIVE</span>
                <h2 class="kit-title">BOX KOLEKSI MERCHANDISE RESMI TIAP TAHUN</h2>
                <p class="text-secondary mb-4" style="line-height: 1.6;">
                    Anggota Annual Plus mendapatkan kit fisik eksklusif yang dikirimkan langsung ke rumah Anda setiap tahun pembaharuan. Koleksi barang langka yang tidak dijual di toko umum mana pun!
                </p>

                <div class="kit-item-row">
                    <i class="fa-solid fa-shield-halved"></i>
                    <span><strong>Marvel Legends Action Figure Eksklusif</strong> dengan kemasan collector retro</span>
                </div>
                <div class="kit-item-row">
                    <i class="fa-solid fa-book-bookmark"></i>
                    <span><strong>2 Komik Edisi Khusus</strong> dengan artwork variant cover langka</span>
                </div>
                <div class="kit-item-row">
                    <i class="fa-solid fa-medal"></i>
                    <span><strong>Enamel Pin Koleksi & Patch Bordir</strong> anggota resmi Marvel Unlimited</span>
                </div>
                <div class="kit-item-row">
                    <i class="fa-solid fa-tags"></i>
                    <span><strong>Diskon 10% Sepanjang Tahun</strong> di Disney Store online & outlet resmi</span>
                </div>

                <div class="mt-4">
                    <a href="#plans" class="marvel-btn-cut" style="background-color: #e5a823; color: #000 !important;">
                        DAPATKAN MEMBERSHIP KIT SEKARANG
                    </a>
                </div>
            </div>

            <div class="col-12 col-lg-6 text-center">
                <img src="https://terrigen-cdn-marvel.com/content/prod/1x/mu_kit_2024_card.jpg" 
                     alt="Marvel Unlimited Kit" 
                     class="img-fluid rounded-2 shadow-lg" 
                     style="border: 1px solid #333333; max-height: 420px; object-fit: cover;"
                     onerror="this.onerror=null; this.src='https://cdn.marvel.com/content/1x/mu_sellpage_hero_desktop_2024.jpg';">
            </div>
        </div>
    </div>
</section>

<!-- FAQ ACCORDION SECTION -->
<section class="faq-section">
    <div class="container-xl">
        <div class="section-header">
            <p class="section-subtitle">PERTANYAAN UMUM</p>
            <h2 class="section-title">FREQUENTLY ASKED QUESTIONS</h2>
            <p class="section-desc">Semua yang perlu Anda ketahui tentang layanan langganan Marvel Unlimited.</p>
        </div>

        <div class="row justify-content-center">
            <div class="col-12 col-lg-9">
                <div class="accordion marvel-accordion" id="faqAccordion">
                    <!-- FAQ 1 -->
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingOne">
                            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                Apa itu Marvel Unlimited?
                            </button>
                        </h2>
                        <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#faqAccordion">
                            <div class="accordion-body">
                                Marvel Unlimited adalah layanan langganan komik digital resmi dari Marvel yang memberikan akses instan tanpa batas ke lebih dari 30.000 komik digital Marvel, mulai dari rilisan klasik hingga serial modern terbaru, langsung dari ponsel, tablet, atau browser Anda.
                            </div>
                        </div>
                    </div>

                    <!-- FAQ 2 -->
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingTwo">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                Bagaimana cara kerja 7-Day Free Trial (Uji Coba Gratis 7 Hari)?
                            </button>
                        </h2>
                        <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#faqAccordion">
                            <div class="accordion-body">
                                Pengguna baru paket Annual berhak mendapatkan masa uji coba gratis selama 7 hari penuh. Anda dapat menikmati akses ke seluruh katalog 30.000+ komik tanpa biaya sepeser pun selama periode uji coba tersebut. Jika Anda tidak ingin melanjutkan, Anda dapat membatalkannya kapan saja sebelum hari ke-7 berakhir.
                            </div>
                        </div>
                    </div>

                    <!-- FAQ 3 -->
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingThree">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                Apakah saya bisa membaca komik secara offline tanpa internet?
                            </button>
                        </h2>
                        <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#faqAccordion">
                            <div class="accordion-body">
                                Ya! Melalui aplikasi resmi Marvel Unlimited di iOS atau Android, Anda dapat mengunduh edisi komik ke penyimpanan lokal perangkat Anda sehingga Anda dapat membacanya kapan saja di mana saja, bahkan saat berada di pesawat atau di daerah tanpa sinyal seluler.
                            </div>
                        </div>
                    </div>

                    <!-- FAQ 4 -->
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingFour">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                                Kapan komik cetak baru ditambahkan ke Marvel Unlimited?
                            </button>
                        </h2>
                        <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour" data-bs-parent="#faqAccordion">
                            <div class="accordion-body">
                                Edisi komik terbaru ditambahkan ke aplikasi Marvel Unlimited setiap minggu, biasanya sesegera mungkin dalam kurun waktu 3 bulan setelah komik tersebut terbit di toko buku fisik.
                            </div>
                        </div>
                    </div>

                    <!-- FAQ 5 -->
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingFive">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                                Bagaimana cara membatalkan langganan saya?
                            </button>
                        </h2>
                        <div id="collapseFive" class="accordion-collapse collapse" aria-labelledby="headingFive" data-bs-parent="#faqAccordion">
                            <div class="accordion-body">
                                Anda dapat membatalkan langganan Anda kapan saja melalui menu Pengaturan Akun (Account Settings) di situs web atau melalui pengaturan akun toko aplikasi (Apple App Store / Google Play Store). Anda tetap dapat mengakses komik hingga akhir siklus penagihan Anda saat ini.
                            </div>
                        </div>
                    </div>

                    <!-- FAQ 6 -->
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingSix">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseSix" aria-expanded="false" aria-controls="collapseSix">
                                Apa saja isi Exclusive Membership Kit untuk paket Annual Plus?
                            </button>
                        </h2>
                        <div id="collapseSix" class="accordion-collapse collapse" aria-labelledby="headingSix" data-bs-parent="#faqAccordion">
                            <div class="accordion-body">
                                Paket Annual Plus mencakup Exclusive Kit resmi yang berisi: Action Figure Marvel Legends limited-edition, 2 komik varian eksklusif dengan cover langka yang tidak dijual di pasaran, pin koleksi enamel, patch bordir resmi Marvel Unlimited, serta kode diskon 10% di Disney Store.
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- FINAL CALL TO ACTION -->
<section class="final-cta-section">
    <div class="container-xl">
        <h2 class="final-cta-title">SIAP MENJELAJAHI SEMESTA MARVEL?</h2>
        <p class="final-cta-desc">Mulai petualangan Anda hari ini dan nikmati akses tanpa batas ke 30.000+ komik digital terhebat sepanjang masa.</p>
        <a href="#plans" class="final-btn-white">
            MULAI BACA SEKARANG <i class="fa-solid fa-arrow-right ms-2"></i>
        </a>
    </div>
</section>

<!-- Mobile Offcanvas Menu -->
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
                <a href="{{ route('home') }}" class="d-block text-white text-decoration-none px-4 py-3 fw-bold text-uppercase">Home</a>
            </li>
            <li class="border-bottom border-secondary-subtle">
                <a href="{{ route('home') }}#koleksi" class="d-block text-white text-decoration-none px-4 py-3 fw-bold text-uppercase">Comics</a>
            </li>
            <li class="border-bottom border-secondary-subtle">
                <a href="{{ route('unlimited') }}" class="d-block text-danger text-decoration-none px-4 py-3 fw-bold text-uppercase">Unlimited</a>
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
            <a href="#plans" class="btn btn-danger w-100 fw-bold text-uppercase py-2" style="background-color: #e62429; border: none; letter-spacing: 1px;">
                Pilih Paket Langganan
            </a>
        </div>
    </div>
</div>

@endsection

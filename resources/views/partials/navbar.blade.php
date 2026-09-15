<!-- MARVEL OFFICIAL DUAL-TIER NAVBAR -->
<header class="marvel-navbar">
    <!-- Top Bar (52px) -->
    <div class="marvel-nav-top">
        <div class="marvel-nav-top-container">
            <!-- Left Group: Discrete Boxed Cells for LOG IN & SIGN UP or Authenticated User -->
            <div class="marvel-nav-left">
                <button class="marvel-hamburger-btn d-lg-none" type="button" data-bs-toggle="offcanvas" data-bs-target="#marvelMobileMenu" aria-controls="marvelMobileMenu" aria-label="Toggle Menu">
                    <svg aria-hidden="true" height="20" viewBox="0 0 32 32" width="20" xmlns="http://www.w3.org/2000/svg">
                        <path fill="#ffffff" d="M28 24v2.667H4V24h24zm0-9.333v2.667H4v-2.667h24zm0-9.334V8H4V5.333h24z" />
                    </svg>
                </button>

                @auth
                <!-- Logged In: Displays Single Box with Username and Authentic Marvel Dropdown Menu -->
                <div class="dropdown h-100">
                    <a href="#" class="marvel-nav-cell" data-bs-toggle="dropdown" aria-expanded="false">
                        <span class="marvel-user-icon">
                            <svg aria-hidden="true" height="18" viewBox="0 0 24 24" width="18" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <circle cx="12" cy="12" r="10" />
                                <circle cx="12" cy="10" r="3.2" />
                                <path d="M6.2 18.5a6 6 0 0 1 11.6 0" />
                            </svg>
                        </span>
                        <span>{{ strtoupper(Auth::user()->name) }}</span>
                    </a>
                    <div class="dropdown-menu marvel-user-dropdown dropdown-menu-dark shadow-lg">
                        <!-- Gold Warning Banner: Email Verification -->
                        <div class="marvel-dropdown-gold">
                            <p>Verify Your Email To Complete Registration.</p>
                            <a href="javascript:void(0)" onclick="alert('Confirmation email has been resent to {{ Auth::user()->email }}!')">RESEND CONFIRMATION</a>
                        </div>

                        <!-- Marvel Unlimited Instant Access Banner -->
                        <a href="{{ route('unlimited') }}" class="marvel-dropdown-promo">
                            <svg width="36" height="40" viewBox="0 0 44 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M6 4h10v24c0 3.3 2.7 6 6 6s6-2.7 6-6V4h10v24c0 8.8-7.2 16-16 16S6 36.8 6 28V4z" fill="#0072D2" stroke="#ffffff" stroke-width="2.5" />
                                <rect x="1" y="15" width="42" height="15" fill="#e62429" />
                                <text x="22" y="26.5" fill="#ffffff" font-family="'Impact', 'Roboto Condensed', sans-serif" font-weight="900" font-size="10.5" text-anchor="middle" letter-spacing="0.5">MARVEL</text>
                                <text x="22" y="44" fill="#ffffff" font-family="'Roboto Condensed', sans-serif" font-weight="900" font-size="6.5" text-anchor="middle" letter-spacing="0.5">UNLIMITED</text>
                            </svg>
                            <div class="marvel-dropdown-promo-text">
                                GET INSTANT ACCESS<br>30,000+ DIGITAL COMICS!
                            </div>
                        </a>

                        <!-- Menu Links -->
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
                <!-- Guest: LOG IN & SIGN UP Cells -->
                <a href="{{ route('login') }}" class="marvel-nav-cell" title="Log In">
                    <span class="marvel-user-icon">
                        <svg aria-hidden="true" height="18" viewBox="0 0 24 24" width="18" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <circle cx="12" cy="12" r="10" />
                            <circle cx="12" cy="10" r="3.2" />
                            <path d="M6.2 18.5a6 6 0 0 1 11.6 0" />
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
                        <path fill="#fff" d="M22.31 32l3.37-32L1.89 6.85.14 20.47C-.81 27.74 3.12 32 10.22 32h12.09z" />
                        <path fill="#e62429" d="M16.51 3.68l-1.14.33-2.73 21.87h-1.67c-.95 0-1.59-.75-1.47-1.7l2.34-19.15L2.86 7.6 1.22 20.46c-.85 6.38 2.35 10.39 9.11 10.39H21.3l3.07-29.43-7.86 2.26z" />
                    </svg>
                    <div class="marvel-promo-copy">
                        <p class="marvel-promo-title">MARVEL UNLIMITED</p>
                        <p class="marvel-promo-sub">SUBSCRIBE</p>
                    </div>
                </a>

                <button class="marvel-search-cell" id="marvelSearchToggle" type="button" aria-label="Search">
                    <svg aria-hidden="true" height="18" viewBox="0 0 32 32" width="18" xmlns="http://www.w3.org/2000/svg">
                        <path fill="currentColor" d="M29.333 27.452l-8.706-8.706c3.196-4.187 2.599-10.135-1.365-13.604s-9.939-3.269-13.664.456a10.006 10.006 0 0013.147 15.029l8.706 8.706 1.882-1.882zM5.38 12.699a7.32 7.32 0 117.319 7.319 7.328 7.328 0 01-7.319-7.319z" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Primary Nav Links Bar (40px) -->
    <nav class="marvel-nav-primary d-none d-lg-flex">
        <ul class="marvel-nav-menu">
            <li class="marvel-nav-item"><a href="{{ route('home') }}#koleksi" class="marvel-nav-link">Latest Comics</a></li>
            <li class="marvel-nav-item"><a href="{{ route('home') }}#koleksi" class="marvel-nav-link active">Comics</a></li>
            <li class="marvel-nav-item"><a href="#" class="marvel-nav-link">Characters</a></li>
            <li class="marvel-nav-item"><a href="{{ route('home') }}#free-comics" class="marvel-nav-link">Free Comics</a></li>
        </ul>
    </nav>

    <!-- Expandable Search Bar Drawer -->
    <div id="marvelSearchBar" class="marvel-search-drawer d-none">
        <div class="container-xl">
            <form action="{{ route('home') }}" method="GET" class="marvel-search-wrap">
                <input type="text" name="q" id="marvelSearchInput" class="marvel-search-input" placeholder="Search Marvel books, comics, characters..." autocomplete="off">
                <button type="submit" class="marvel-search-submit" aria-label="Submit Search">
                    <svg aria-hidden="true" height="18" viewBox="0 0 32 32" width="18" xmlns="http://www.w3.org/2000/svg">
                        <path fill="currentColor" d="M29.333 27.452l-8.706-8.706c3.196-4.187 2.599-10.135-1.365-13.604s-9.939-3.269-13.664.456a10.006 10.006 0 0013.147 15.029l8.706 8.706 1.882-1.882zM5.38 12.699a7.32 7.32 0 117.319 7.319 7.328 7.328 0 01-7.319-7.319z" />
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

@if (session('error'))
<div class="alert alert-danger alert-dismissible fade show rounded-0 mb-0 border-0 text-center py-2" style="background-color: #b51a1e; color: #ffffff; font-family: 'Roboto Condensed', sans-serif; font-size: 13px; font-weight: 700; letter-spacing: 1px; z-index: 1030; position: relative;" role="alert">
    <i class="fa-solid fa-triangle-exclamation me-2"></i> {{ session('error') }}
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
                    <circle cx="12" cy="12" r="10" />
                    <circle cx="12" cy="10" r="3.2" />
                    <path d="M6.2 18.5a6 6 0 0 1 11.6 0" />
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
                <a href="{{ route('home') }}#koleksi" class="d-block text-danger text-decoration-none px-4 py-3 fw-bold text-uppercase">Comics</a>
            </li>
            <li class="border-bottom border-secondary-subtle">
                <a href="#" class="d-block text-white text-decoration-none px-4 py-3 fw-bold text-uppercase">Characters</a>
            </li>
            <li class="border-bottom border-secondary-subtle">
                <a href="{{ route('home') }}#free-comics" class="d-block text-white text-decoration-none px-4 py-3 fw-bold text-uppercase">Free Comics</a>
            </li>
            <li class="border-bottom border-secondary-subtle">
                <a href="{{ route('home') }}#koleksi" class="d-block text-white text-decoration-none px-4 py-3 fw-bold text-uppercase">Latest Comics</a>
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

@extends('layouts.app')

@section('content')
{{-- Unlimited Custom Stylesheet --}}
<link rel="stylesheet" href="{{ asset('css/unlimited.css') }}">

{{-- Official Marvel Dual-Tier Navigation --}}
@include('partials.navbar')

<!-- Active Subscription Notice (if user already subscribed) -->
@if ($activeSubscription)
    <div class="py-3 px-4 text-center" style="background-color: #1f1807; border-bottom: 1px solid #e5a823;">
        <div class="container-xl d-flex flex-wrap align-items-center justify-content-center gap-3">
            <span class="badge" style="background-color: #e5a823; color: #000; font-family: 'Roboto Condensed', sans-serif; font-size: 12px; font-weight: 900; letter-spacing: 1px;">ACTIVE PLAN</span>
            <span class="text-white" style="font-size: 14px;">
                You are currently subscribed to <strong>{{ $activeSubscription->subscriptionPackage->name_package ?? 'Marvel Unlimited' }}</strong> until <strong>{{ \Carbon\Carbon::parse($activeSubscription->expired_date)->format('F d, Y') }}</strong>.
            </span>
            <a href="{{ route('home') }}#koleksi" class="btn btn-sm btn-outline-light text-uppercase fw-bold" style="font-family: 'Roboto Condensed', sans-serif; font-size: 11px; letter-spacing: 1px;">Start Reading Comics</a>
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
                Get instant access to Marvel's legendary comic library for one low price! Explore over 30,000 comics spanning 85 years of Marvel history. Discover your favorite heroes, blockbuster crossover events, and exclusive Infinity Comics series.
            </p>

            <div class="d-flex flex-wrap gap-3 align-items-center">
                <a href="#plans" class="marvel-btn-cut">
                    <span>CHOOSE A PLAN</span>
                    <i class="fa-solid fa-arrow-down fs-6"></i>
                </a>
                <a href="#features" class="marvel-btn-secondary">
                    <span>EXPLORE APP FEATURES</span>
                </a>
            </div>
        </div>
    </div>
</section>

<!-- PRICING TIERS SECTION -->
<section class="plans-section" id="plans">
    <div class="container-xl">
        <div class="section-header">
            <p class="section-subtitle">MEMBERSHIP TIERS</p>
            <h2 class="section-title">PICK THE PLAN THAT'S RIGHT FOR YOU</h2>
            <p class="section-desc">Enjoy unlimited reading of thousands of Marvel comics across all your devices. Cancel anytime with no long-term commitment.</p>
        </div>

        <div class="row g-4 align-items-stretch">
            <!-- 1. MONTHLY PLAN -->
            <div class="col-12 col-md-4">
                <div class="pricing-card">
                    <div>
                        <h3 class="plan-name">MONTHLY</h3>
                        <p class="text-secondary mb-0" style="font-size: 13px;">Flexible & convenient for casual comic readers</p>
                        
                        <div class="plan-price-wrap">
                            <div class="d-flex align-items-baseline gap-1">
                                <span class="plan-price">Rp 149.000</span>
                                <span class="plan-period">/ month</span>
                            </div>
                            <div class="plan-subtext">Billed monthly • Cancel anytime</div>
                        </div>

                        <ul class="plan-features">
                            <li><i class="fa-solid fa-check"></i> Unlimited access to 30,000+ digital comics</li>
                            <li><i class="fa-solid fa-check"></i> New issues added weekly (as soon as 3 months after print)</li>
                            <li><i class="fa-solid fa-check"></i> Download comics to read offline</li>
                            <li><i class="fa-solid fa-check"></i> Read on iOS, Android, and Web Reader</li>
                            <li><i class="fa-solid fa-check"></i> Smart Panels mode for guided reading</li>
                        </ul>
                    </div>

                    <div>
                        <form action="{{ route('unlimited.subscribe', 1) }}" method="POST">
                            @csrf
                            <button type="submit" class="marvel-btn-cut w-100 justify-content-center">
                                JOIN MONTHLY
                            </button>
                        </form>
                    </div>
                </div>
            </div>

            <!-- 2. ANNUAL PLAN (FEATURED - BEST VALUE) -->
            <div class="col-12 col-md-4">
                <div class="pricing-card featured">
                    <div class="plan-pill plan-pill-red">
                        <i class="fa-solid fa-bolt me-1"></i> BEST VALUE — SAVE >40%
                    </div>

                    <div>
                        <h3 class="plan-name text-danger">ANNUAL</h3>
                        <p class="text-secondary mb-0" style="font-size: 13px;">Most popular choice for Marvel fans</p>
                        
                        <div class="plan-price-wrap">
                            <div class="d-flex align-items-baseline gap-1">
                                <span class="plan-price text-danger">Rp 999.000</span>
                                <span class="plan-period">/ year</span>
                            </div>
                            <div class="plan-subtext text-warning fw-bold">Only ~Rp 83,250/month (Billed annually)</div>
                        </div>

                        <ul class="plan-features">
                            <li class="fw-bold text-white"><i class="fa-solid fa-gift text-warning"></i> Includes 7-Day Free Trial</li>
                            <li><i class="fa-solid fa-check"></i> <strong>All features in Monthly Plan</strong></li>
                            <li><i class="fa-solid fa-check"></i> Full access to exclusive vertical <em>Infinity Comics</em></li>
                            <li><i class="fa-solid fa-check"></i> Save over Rp 789,000 compared to paying monthly</li>
                            <li><i class="fa-solid fa-check"></i> Ad-free reading experience across all devices</li>
                        </ul>
                    </div>

                    <div>
                        <form action="{{ route('unlimited.subscribe', 2) }}" method="POST">
                            @csrf
                            <button type="submit" class="marvel-btn-cut w-100 justify-content-center" style="box-shadow: 0 8px 25px rgba(230, 36, 41, 0.6);">
                                START 7-DAY FREE TRIAL <i class="fa-solid fa-arrow-right ms-1"></i>
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
                        <p class="text-secondary mb-0" style="font-size: 13px;">For hardcore fans & Marvel collectors</p>
                        
                        <div class="plan-price-wrap">
                            <div class="d-flex align-items-baseline gap-1">
                                <span class="plan-price" style="color: #e5a823;">Rp 1.499.000</span>
                                <span class="plan-period">/ year</span>
                            </div>
                            <div class="plan-subtext">Includes Annual Physical Collector Kit</div>
                        </div>

                        <ul class="plan-features plus-features">
                            <li><i class="fa-solid fa-check"></i> <strong>All features in Annual Plan</strong></li>
                            <li class="text-white fw-bold"><i class="fa-solid fa-star"></i> <strong>Exclusive Marvel Legends Action Figure</strong></li>
                            <li class="text-white fw-bold"><i class="fa-solid fa-star"></i> <strong>2 Exclusive Variant Comics</strong> (Only for Plus members)</li>
                            <li><i class="fa-solid fa-check"></i> Official Marvel Unlimited enamel pin & patch</li>
                            <li><i class="fa-solid fa-check"></i> <strong>10% Discount</strong> at Disney Store</li>
                            <li><i class="fa-solid fa-check"></i> Exclusive invites to Marvel events & comic panels</li>
                        </ul>
                    </div>

                    <div>
                        <form action="{{ route('unlimited.subscribe', 3) }}" method="POST">
                            @csrf
                            <button type="submit" class="marvel-btn-cut w-100 justify-content-center" style="background-color: #e5a823; color: #000000 !important;">
                                JOIN ANNUAL PLUS
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
            <p class="section-subtitle">APP FEATURES</p>
            <h2 class="section-title">READ ANYWHERE, ANYTIME</h2>
            <p class="section-desc">The Marvel Unlimited app is built from the ground up for the ultimate digital comics experience.</p>
        </div>

        <div class="row g-4">
            <div class="col-12 col-md-6 col-lg-3">
                <div class="feature-card">
                    <div class="feature-icon-box">
                        <i class="fa-solid fa-mobile-screen-button"></i>
                    </div>
                    <h4 class="feature-title">Infinity Comics</h4>
                    <p class="feature-text">Visionary vertical comics formatted specially for mobile devices, featuring original stories from top Marvel creators.</p>
                </div>
            </div>

            <div class="col-12 col-md-6 col-lg-3">
                <div class="feature-card">
                    <div class="feature-icon-box">
                        <i class="fa-solid fa-book-open"></i>
                    </div>
                    <h4 class="feature-title">30,000+ Comics</h4>
                    <p class="feature-text">Giant catalog spanning 1960s classics by Stan Lee & Jack Kirby to modern events like Secret Wars, Krakoa, and Civil War.</p>
                </div>
            </div>

            <div class="col-12 col-md-6 col-lg-3">
                <div class="feature-card">
                    <div class="feature-icon-box">
                        <i class="fa-solid fa-cloud-arrow-down"></i>
                    </div>
                    <h4 class="feature-title">Download & Read Offline</h4>
                    <p class="feature-text">Save comic issues directly to your device. Read comfortably on flights, road trips, or anywhere without cell service.</p>
                </div>
            </div>

            <div class="col-12 col-md-6 col-lg-3">
                <div class="feature-card">
                    <div class="feature-icon-box">
                        <i class="fa-solid fa-compass"></i>
                    </div>
                    <h4 class="feature-title">Reading Guides</h4>
                    <p class="feature-text">Follow curated reading pathways created by Marvel editors for Spider-Man, Avengers, X-Men, Deadpool, and more.</p>
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
                <h2 class="kit-title">OFFICIAL COLLECTOR KIT DELIVERED EVERY YEAR</h2>
                <p class="text-secondary mb-4" style="line-height: 1.6;">
                    Annual Plus members receive an exclusive physical collector kit delivered straight to their doorstep every renewal year. Rare collectible items not sold in stores!
                </p>

                <div class="kit-item-row">
                    <i class="fa-solid fa-shield-halved"></i>
                    <span><strong>Exclusive Marvel Legends Action Figure</strong> in retro collector packaging</span>
                </div>
                <div class="kit-item-row">
                    <i class="fa-solid fa-book-bookmark"></i>
                    <span><strong>2 Special Edition Comics</strong> featuring rare variant cover artwork</span>
                </div>
                <div class="kit-item-row">
                    <i class="fa-solid fa-medal"></i>
                    <span><strong>Collectible Enamel Pin & Embroidered Member Patch</strong></span>
                </div>
                <div class="kit-item-row">
                    <i class="fa-solid fa-tags"></i>
                    <span><strong>10% Year-Round Discount</strong> at Disney Store online & retail outlets</span>
                </div>

                <div class="mt-4">
                    <a href="#plans" class="marvel-btn-cut" style="background-color: #e5a823; color: #000 !important;">
                        GET MEMBERSHIP KIT NOW
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
            <p class="section-subtitle">FAQS</p>
            <h2 class="section-title">FREQUENTLY ASKED QUESTIONS</h2>
            <p class="section-desc">Everything you need to know about Marvel Unlimited subscription.</p>
        </div>

        <div class="row justify-content-center">
            <div class="col-12 col-lg-9">
                <div class="accordion marvel-accordion" id="faqAccordion">
                    <!-- FAQ 1 -->
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingOne">
                            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                What is Marvel Unlimited?
                            </button>
                        </h2>
                        <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#faqAccordion">
                            <div class="accordion-body">
                                Marvel Unlimited is Marvel's premier digital comics subscription service, granting members instant, unlimited access to over 30,000 digital comics spanning classic runs to recent releases, right on your phone, tablet, or web browser.
                            </div>
                        </div>
                    </div>

                    <!-- FAQ 2 -->
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingTwo">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                How does the 7-Day Free Trial work?
                            </button>
                        </h2>
                        <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#faqAccordion">
                            <div class="accordion-body">
                                New Annual subscribers are eligible for a 7-day free trial. You enjoy complete, unlimited access to the entire 30,000+ comic catalog at zero charge during the trial. If you don't wish to continue, you can cancel anytime before day 7 ends.
                            </div>
                        </div>
                    </div>

                    <!-- FAQ 3 -->
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingThree">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                Can I download and read comics offline without internet?
                            </button>
                        </h2>
                        <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#faqAccordion">
                            <div class="accordion-body">
                                Yes! Using the official Marvel Unlimited app on iOS or Android, you can download comics directly to your device so you can read anytime, anywhere—even in airplane mode or with no internet connection.
                            </div>
                        </div>
                    </div>

                    <!-- FAQ 4 -->
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingFour">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                                When are new print comics added to Marvel Unlimited?
                            </button>
                        </h2>
                        <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour" data-bs-parent="#faqAccordion">
                            <div class="accordion-body">
                                New digital issues are added to the Marvel Unlimited catalog every week, usually as soon as 3 months after their print release in comic stores.
                            </div>
                        </div>
                    </div>

                    <!-- FAQ 5 -->
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingFive">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                                How do I cancel my subscription?
                            </button>
                        </h2>
                        <div id="collapseFive" class="accordion-collapse collapse" aria-labelledby="headingFive" data-bs-parent="#faqAccordion">
                            <div class="accordion-body">
                                You can cancel your subscription at any time through your Account Settings on the website or via your app store subscription settings (Apple App Store or Google Play Store). You retain access until the end of your current billing cycle.
                            </div>
                        </div>
                    </div>

                    <!-- FAQ 6 -->
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingSix">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseSix" aria-expanded="false" aria-controls="collapseSix">
                                What is included in the Annual Plus Membership Kit?
                            </button>
                        </h2>
                        <div id="collapseSix" class="accordion-collapse collapse" aria-labelledby="headingSix" data-bs-parent="#faqAccordion">
                            <div class="accordion-body">
                                The Annual Plus membership kit includes an exclusive, limited-edition Marvel Legends action figure, 2 exclusive variant comics with rare covers, a collectible enamel pin, an embroidered member patch, and a 10% discount at the Disney Store.
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
        <h2 class="final-cta-title">READY TO EXPLORE THE MARVEL UNIVERSE?</h2>
        <p class="final-cta-desc">Start your adventure today and enjoy unlimited access to 30,000+ of the greatest digital comics of all time.</p>
        <a href="#plans" class="final-btn-white">
            START READING NOW <i class="fa-solid fa-arrow-right ms-2"></i>
        </a>
    </div>
</section>

@endsection

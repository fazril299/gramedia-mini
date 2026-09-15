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
                <img class="marvel-slide-img" alt="Meet Anti-Venom, Venom's Polar Opposite"
                    src="{{ asset('images/banners/banner1_antivenom.webp') }}"
                    fetchpriority="high" loading="eager">
                <div class="marvel-gradient-overlay"></div>
                <div class="container-xl marvel-content-container">
                    <div class="marvel-content-box">
                        <span class="marvel-badge">Character Close-Up</span>
                        <h1 class="marvel-title">Meet Anti-Venom, Venom's Polar Opposite</h1>
                        <p class="marvel-desc">Explore the origin of the Anti-Venom symbiote with its cleansing powers and iconic rivalries across the Marvel Comics universe.</p>
                        <a href="#koleksi" class="marvel-btn">
                            <span>Read Now!</span>
                            <i class="fa-solid fa-arrow-right fs-6"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Slide 2: Apocalypse -->
        <div class="carousel-item">
            <div class="marvel-slide">
                <img class="marvel-slide-img" alt="Apocalypse's Rise to Power in Egypt"
                    src="{{ asset('images/banners/banner2_apocalypse.webp') }}"
                    loading="lazy">
                <div class="marvel-gradient-overlay"></div>
                <div class="container-xl marvel-content-container">
                    <div class="marvel-content-box">
                        <span class="marvel-badge">X-Men '97 Explained</span>
                        <h1 class="marvel-title">Apocalypse’s Rise to Power in Egypt</h1>
                        <p class="marvel-desc">Trace En Sabah Nur's rise to power in ancient Egypt to become one of the oldest and most formidable mutants in Marvel history.</p>
                        <a href="#koleksi" class="marvel-btn">
                            <span>Explore Apocalypse!</span>
                            <i class="fa-solid fa-arrow-right fs-6"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Slide 3: X-Factor -->
        <div class="carousel-item">
            <div class="marvel-slide">
                <img class="marvel-slide-img" alt="X-Factor's Team History in the Comics"
                    src="{{ asset('images/banners/banner3_xfactor.webp') }}"
                    loading="lazy">
                <div class="marvel-gradient-overlay"></div>
                <div class="container-xl marvel-content-container">
                    <div class="marvel-content-box">
                        <span class="marvel-badge">X-Men '97 Explained</span>
                        <h1 class="marvel-title">X-Factor’s Team History in the Comics</h1>
                        <p class="marvel-desc">The complete history of the government-sponsored mutant squad and its legendary roster from Havok to Strong Guy.</p>
                        <a href="{{ route('unlimited') }}" class="marvel-btn">
                            <span>Read on Unlimited!</span>
                            <i class="fa-solid fa-arrow-right fs-6"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Slide 4: Cable -->
        <div class="carousel-item">
            <div class="marvel-slide">
                <img class="marvel-slide-img" alt="Cable: Soldier from the Future"
                    src="{{ asset('images/banners/banner4_cable.webp') }}"
                    loading="lazy">
                <div class="marvel-gradient-overlay"></div>
                <div class="container-xl marvel-content-container">
                    <div class="marvel-content-box">
                        <span class="marvel-badge">Mutant Destiny</span>
                        <h1 class="marvel-title">Cable: Soldier from the Future</h1>
                        <p class="marvel-desc">Follow the time-traveling warrior Nathan Summers as he leads mutant squads across dimensions and future timelines.</p>
                        <a href="#koleksi" class="marvel-btn">
                            <span>Read Cable Series!</span>
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

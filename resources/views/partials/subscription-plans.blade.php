<!-- MARVEL UNLIMITED SUBSCRIPTION PLANS -->
<section class="container-xl mt-5" id="langganan">
    <div class="d-flex align-items-center justify-content-between mb-4">
        <div>
            <span class="text-danger fw-bold text-uppercase" style="font-family: 'Roboto Condensed', sans-serif; font-size: 12px; letter-spacing: 1.5px;">Marvel Unlimited</span>
            <h2 class="m-0 text-white" style="font-family: 'Roboto Condensed', sans-serif; font-weight: 800; letter-spacing: 0.5px;">Subscription Plans</h2>
        </div>
        <a href="{{ route('unlimited') }}" class="btn btn-sm text-uppercase fw-bold text-danger" style="font-family: 'Roboto Condensed', sans-serif; letter-spacing: 1px;">
            View Unlimited Page <i class="fa-solid fa-arrow-right ms-1"></i>
        </a>
    </div>

    <div class="row row-cards g-4">
        <!-- Monthly Plan -->
        <div class="col-12 col-md-4">
            <article class="card h-100 bg-dark text-white border-secondary">
                <div class="card-body d-flex flex-column justify-content-between p-4">
                    <div>
                        <h3 class="card-title text-uppercase" style="font-family: 'Roboto Condensed', sans-serif; font-weight: 800;">Monthly</h3>
                        <p class="text-secondary" style="font-size: 13px;">Unlimited access to 30,000+ digital comics, weekly new releases, offline reading on iOS & Android.</p>
                        <div class="my-3">
                            <span class="h2 fw-bold text-white">Rp 149.000</span>
                            <span class="text-secondary">/ mo</span>
                        </div>
                    </div>
                    <form action="{{ route('unlimited.subscribe', 1) }}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-outline-light w-100 fw-bold text-uppercase py-2" style="font-family: 'Roboto Condensed', sans-serif; letter-spacing: 1px;">Choose Monthly</button>
                    </form>
                </div>
            </article>
        </div>

        <!-- Annual Plan -->
        <div class="col-12 col-md-4">
            <article class="card h-100 bg-dark text-white border-danger" style="box-shadow: 0 0 25px rgba(230, 36, 41, 0.3);">
                <div class="card-body d-flex flex-column justify-content-between position-relative p-4">
                    <span class="badge bg-danger position-absolute top-0 end-0 m-3 text-uppercase" style="font-family: 'Roboto Condensed', sans-serif; font-size: 10px; letter-spacing: 1px;">Best Value</span>
                    <div>
                        <h3 class="card-title text-uppercase text-danger" style="font-family: 'Roboto Condensed', sans-serif; font-weight: 800;">Annual</h3>
                        <p class="text-secondary" style="font-size: 13px;">Save >40% vs monthly, includes 7-day free trial, and exclusive Infinity Comics access.</p>
                        <div class="my-3">
                            <span class="h2 fw-bold text-danger">Rp 999.000</span>
                            <span class="text-secondary">/ yr</span>
                            <div class="text-warning small fw-bold mt-1">~Rp 83,250/mo</div>
                        </div>
                    </div>
                    <form action="{{ route('unlimited.subscribe', 2) }}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-danger w-100 fw-bold text-uppercase py-2" style="background-color: #e62429; border: none; font-family: 'Roboto Condensed', sans-serif; letter-spacing: 1px;">Start 7-Day Free Trial</button>
                    </form>
                </div>
            </article>
        </div>

        <!-- Annual Plus Plan -->
        <div class="col-12 col-md-4">
            <article class="card h-100 bg-dark text-white" style="border: 1px solid #e5a823;">
                <div class="card-body d-flex flex-column justify-content-between position-relative p-4">
                    <span class="badge position-absolute top-0 end-0 m-3 text-uppercase" style="background-color: #e5a823; color: #000; font-family: 'Roboto Condensed', sans-serif; font-size: 10px; letter-spacing: 1px;">Membership Kit</span>
                    <div>
                        <h3 class="card-title text-uppercase" style="color: #e5a823; font-family: 'Roboto Condensed', sans-serif; font-weight: 800;">Annual Plus</h3>
                        <p class="text-secondary" style="font-size: 13px;">Includes physical box: Exclusive Marvel Legends figure, 2 variant comics, pin, patch & Disney Store discount.</p>
                        <div class="my-3">
                            <span class="h2 fw-bold" style="color: #e5a823;">Rp 1.499.000</span>
                            <span class="text-secondary">/ yr</span>
                        </div>
                    </div>
                    <form action="{{ route('unlimited.subscribe', 3) }}" method="POST">
                        @csrf
                        <button type="submit" class="btn w-100 fw-bold text-uppercase py-2" style="background-color: #e5a823; color: #000; font-family: 'Roboto Condensed', sans-serif; letter-spacing: 1px;">Join Annual Plus</button>
                    </form>
                </div>
            </article>
        </div>
    </div>
</section>

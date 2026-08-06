@extends('layouts.app')

@section('title', 'Home')
@section('meta_description', 'Cereal Transport moves your cereals safely across Tanzania, and supplies quality maize, rice, beans and wheat with flexible transportation options.')

@section('content')

    {{-- ===================== HERO ===================== --}}
    <section class="hero">
        <div class="container">
            <div class="row align-items-center gy-5">
                <div class="col-lg-6">
                    <span class="hero-eyebrow">Green Route Ltd &amp; Supply</span>
                    <h1 class="mt-3">Reliable Cereal Transportation Across Tanzania</h1>
                    <p class="lead mt-3">
                        Whether you need your own cereals moved safely, or you'd like to buy quality
                        maize, rice, beans and wheat with delivery included, we handle the logistics
                        from pickup to destination.
                    </p>
                    <div class="hero-actions">
                        <a href="{{ Route::has('requests.create') ? route('requests.create') : url('/request-service') }}"
                        class="btn btn-brand btn-lg">Request Service</a>
                        <a href="{{ route('cereals') }}" class="btn btn-outline-brand btn-lg">View Our Cereals</a>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="hero-image-wrap">
                        <img src="{{ asset('images/zungu.jpeg') }}"
                            alt="A loaded truck transporting sacks of cereals on a road in Tanzania"
                            loading="lazy" width="800" height="600">
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- ===================== SERVICES SUMMARY ===================== --}}
    <section class="section" id="services-summary">
        <div class="container">
            <div class="section-heading fade-in-up">
                <span class="eyebrow">What We Offer</span>
                <h2>Three Ways We Can Help</h2>
                <p>Choose the option that fits how you already work with cereals.</p>
            </div>

            <div class="row g-4">
                <div class="col-md-4">
                    <div class="card-service fade-in-up">
                        <div class="icon-tile">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <rect x="1" y="7" width="15" height="10"></rect>
                                <path d="M16 10h4l3 3v4h-7z"></path>
                                <circle cx="5.5" cy="19.5" r="1.5"></circle>
                                <circle cx="18.5" cy="19.5" r="1.5"></circle>
                            </svg>
                        </div>
                        <h3>Transport My Own Cereals</h3>
                        <p>You already own the cereals — we simply move them from your pickup point
                        to wherever they need to go.</p>
                        <a href="{{ route('services') }}#transport-own">Learn more &rarr;</a>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card-service fade-in-up">
                        <div class="icon-tile">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M6 2 3 6v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6l-3-4z"></path>
                                <line x1="3" y1="6" x2="21" y2="6"></line>
                                <path d="M16 10a4 4 0 0 1-8 0"></path>
                            </svg>
                        </div>
                        <h3>Buy Company Cereals With Transportation</h3>
                        <p>Purchase maize, rice, beans, wheat and more directly from us, delivered
                        straight to your location.</p>
                        <a href="{{ route('services') }}#buy-with-transport">Learn more &rarr;</a>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card-service fade-in-up">
                        <div class="icon-tile">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M20.4 14.5 16 10 4 20"></path>
                                <path d="M4 4h16v6a6 6 0 0 1-6 6H8"></path>
                            </svg>
                        </div>
                        <h3>Buy Company Cereals Without Transportation</h3>
                        <p>Purchase our cereals and collect them yourself, at a price that reflects
                        self-collection.</p>
                        <a href="{{ route('services') }}#buy-without-transport">Learn more &rarr;</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- ===================== HOW IT WORKS ===================== --}}
    <section class="section bg-brand-light">
        <div class="container">
            <div class="section-heading fade-in-up">
                <span class="eyebrow">Simple Process</span>
                <h2>How It Works</h2>
                <p>From your first request to a completed delivery, here is the journey your
                request takes.</p>
            </div>

            <div class="row route-track gy-5">
                <div class="col-md-3 route-step fade-in-up">
                    <div class="route-marker">1</div>
                    <div>
                        <h4>Submit a Request</h4>
                        <p>Tell us what you need — transportation, purchase, or both.</p>
                    </div>
                </div>
                <div class="col-md-3 route-step fade-in-up">
                    <div class="route-marker">2</div>
                    <div>
                        <h4>Receive a Quotation</h4>
                        <p>Our administrator reviews your request and sends a clear quotation.</p>
                    </div>
                </div>
                <div class="col-md-3 route-step fade-in-up">
                    <div class="route-marker">3</div>
                    <div>
                        <h4>Accept or Reject</h4>
                        <p>You review the quotation and decide whether to proceed.</p>
                    </div>
                </div>
                <div class="col-md-3 route-step fade-in-up">
                    <div class="route-marker">4</div>
                    <div>
                        <h4>We Contact You</h4>
                        <p>Once accepted, our team reaches out to arrange the details.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- ===================== WHY CHOOSE US ===================== --}}
    <section class="section">
        <div class="container">
            <div class="section-heading fade-in-up">
                <span class="eyebrow">Why Choose Us</span>
                <h2>Built Around Trust and Clarity</h2>
            </div>

            <div class="row g-4">
                <div class="col-sm-6 col-lg-4">
                    <div class="card-benefit fade-in-up">
                        <div class="icon-tile">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"></path></svg>
                        </div>
                        <h3 class="h5">Reliable Transportation</h3>
                        <p>We plan every trip carefully so your cereals arrive on time.</p>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-4">
                    <div class="card-benefit fade-in-up">
                        <div class="icon-tile">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="7" width="18" height="13" rx="2"></rect><path d="M8 7V5a4 4 0 0 1 8 0v2"></path></svg>
                        </div>
                        <h3 class="h5">Safe Cereal Handling</h3>
                        <p>Your cereals are loaded, secured and stored with care throughout.</p>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-4">
                    <div class="card-benefit fade-in-up">
                        <div class="icon-tile">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M9 11l3 3L22 4"></path><path d="M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11"></path></svg>
                        </div>
                        <h3 class="h5">Clear Quotations</h3>
                        <p>You know the cost before you commit — no hidden surprises.</p>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-4">
                    <div class="card-benefit fade-in-up">
                        <div class="icon-tile">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"></path></svg>
                        </div>
                        <h3 class="h5">Direct Communication</h3>
                        <p>Our team contacts you personally once your request is accepted.</p>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-4">
                    <div class="card-benefit fade-in-up">
                        <div class="icon-tile">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M4 21V9l8-6 8 6v12"></path><path d="M9 21v-6h6v6"></path></svg>
                        </div>
                        <h3 class="h5">Flexible Service Options</h3>
                        <p>Transport-only, buy-with-delivery, or buy-and-collect — you choose.</p>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-4">
                    <div class="card-benefit fade-in-up">
                        <div class="icon-tile">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M3 3v18h18"></path><path d="m19 9-5 5-4-4-3 3"></path></svg>
                        </div>
                        <h3 class="h5">Coverage Across Tanzania</h3>
                        <p>Serving customers wherever your cereals need to travel.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- ===================== CALL TO ACTION ===================== --}}
    <section class="section-tight">
        <div class="container">
            <div class="cta-band fade-in-up text-center">
                <h2>Ready to Move or Buy Cereals?</h2>
                <p class="mb-4">Submit a request today and receive a clear quotation from our team.</p>
                <a href="{{ Route::has('requests.create') ? route('requests.create') : url('/request-service') }}"
                class="btn btn-brand btn-lg">Request Service Now</a>
            </div>
        </div>
    </section>

@endsection
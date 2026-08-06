@extends('layouts.app')

@section('title', 'Services')
@section('meta_description', 'Explore our three cereal services: transport your own cereals, buy company cereals with transportation, or buy company cereals without transportation.')

@section('content')

    <section class="hero" style="padding: 3.5rem 0;">
        <div class="container">
            <span class="hero-eyebrow">Our Services</span>
            <h1 class="mt-3">Three Ways to Work With Us</h1>
            <p class="lead mt-3">
                Pick the service that matches your situation. Every request goes through the same
                simple process — submit, receive a quotation, then decide.
            </p>
        </div>
    </section>

    <section class="section">
        <div class="container">

            {{-- ===================== SERVICE 1 ===================== --}}
            <div class="service-block" id="transport-own">
                <div class="row gy-4 align-items-start">
                    <div class="col-lg-8">
                        <span class="service-number">Service 01</span>
                        <h2 class="mt-2">Transport My Own Cereals</h2>
                        <p>
                            If you already own cereals — maize, rice, beans, wheat or any other type —
                            and simply need them moved from one place to another, this service is for
                            you. We handle pickup, transportation and delivery to your chosen
                            destination.
                        </p>

                        <h3 class="h5 mt-4">Who this is for</h3>
                        <p>Farmers, traders, cooperatives, or any customer who needs their existing
                        cereal stock transported reliably.</p>

                        <h3 class="h5 mt-4">Information you may need to provide</h3>
                        <ul class="service-meta-list">
                            <li>Pickup location and destination</li>
                            <li>Type and estimated quantity of cereal</li>
                            <li>Preferred date for transportation</li>
                            <li>Any special handling requirements</li>
                        </ul>

                        <a href="{{ Route::has('requests.create') ? route('requests.create') : url('/request-service') }}"
                        class="btn btn-brand mt-2">Request This Service</a>
                    </div>
                    <div class="col-lg-4">
                        <div class="card-service-detail fade-in-up">
                            <div class="icon-tile">
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <rect x="1" y="7" width="15" height="10"></rect>
                                    <path d="M16 10h4l3 3v4h-7z"></path>
                                    <circle cx="5.5" cy="19.5" r="1.5"></circle>
                                    <circle cx="18.5" cy="19.5" r="1.5"></circle>
                                </svg>
                            </div>
                            <h3>You own it, we move it</h3>
                            <p>Transportation only — no purchase involved. You stay in control of
                            your cereals from start to finish.</p>
                        </div>
                    </div>
                </div>
            </div>

            {{-- ===================== SERVICE 2 ===================== --}}
            <div class="service-block" id="buy-with-transport">
                <div class="row gy-4 align-items-start">
                    <div class="col-lg-8">
                        <span class="service-number">Service 02</span>
                        <h2 class="mt-2">Buy Company Cereals With Transportation</h2>
                        <p>
                            Purchase cereals directly from our available stock and have them
                            delivered to your location. This service combines the cereal purchase and
                            the transportation into one request.
                        </p>

                        <h3 class="h5 mt-4">Who this is for</h3>
                        <p>Customers who want quality cereals without arranging their own pickup or
                        transport.</p>

                        <h3 class="h5 mt-4">Information you may need to provide</h3>
                        <ul class="service-meta-list">
                            <li>Cereal type and quantity needed</li>
                            <li>Delivery location</li>
                            <li>Preferred delivery date</li>
                            <li>Contact details for coordination</li>
                        </ul>

                        <a href="{{ Route::has('requests.create') ? route('requests.create') : url('/request-service') }}"
                        class="btn btn-brand mt-2">Request This Service</a>
                    </div>
                    <div class="col-lg-4">
                        <div class="card-service-detail fade-in-up">
                            <div class="icon-tile">
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M6 2 3 6v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6l-3-4z"></path>
                                    <line x1="3" y1="6" x2="21" y2="6"></line>
                                    <path d="M16 10a4 4 0 0 1-8 0"></path>
                                </svg>
                            </div>
                            <h3>Buy and deliver, together</h3>
                            <p>One request covers both the cereal purchase and its delivery to you.</p>
                        </div>
                    </div>
                </div>
            </div>

            {{-- ===================== SERVICE 3 ===================== --}}
            <div class="service-block" id="buy-without-transport">
                <div class="row gy-4 align-items-start">
                    <div class="col-lg-8">
                        <span class="service-number">Service 03</span>
                        <h2 class="mt-2">Buy Company Cereals Without Transportation</h2>
                        <p>
                            Purchase cereals from our available stock and arrange your own collection.
                            This option suits customers who already have transportation in place.
                        </p>

                        <h3 class="h5 mt-4">Who this is for</h3>
                        <p>Customers who prefer to collect their cereals themselves, or who already
                        have their own transport arrangements.</p>

                        <h3 class="h5 mt-4">Information you may need to provide</h3>
                        <ul class="service-meta-list">
                            <li>Cereal type and quantity needed</li>
                            <li>Preferred collection date</li>
                            <li>Contact details for coordination</li>
                        </ul>

                        <a href="{{ Route::has('requests.create') ? route('requests.create') : url('/request-service') }}"
                        class="btn btn-brand mt-2">Request This Service</a>
                    </div>
                    <div class="col-lg-4">
                        <div class="card-service-detail fade-in-up">
                            <div class="icon-tile">
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M20.4 14.5 16 10 4 20"></path>
                                    <path d="M4 4h16v6a6 6 0 0 1-6 6H8"></path>
                                </svg>
                            </div>
                            <h3>Buy now, collect yourself</h3>
                            <p>Just the cereals — you arrange the pickup on your side.</p>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>

    <section class="section-tight bg-brand-light">
        <div class="container">
            <div class="cta-band fade-in-up text-center">
                <h2>Not Sure Which Service Fits?</h2>
                <p class="mb-4">Submit a request and describe what you need — we'll guide you from there.</p>
                <a href="{{ Route::has('requests.create') ? route('requests.create') : url('/request-service') }}"
                class="btn btn-brand btn-lg">Request Service</a>
            </div>
        </div>
    </section>

@endsection

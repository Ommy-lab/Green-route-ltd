@extends('layouts.app')

@section('title', 'About Us')
@section('meta_description', 'Learn about Cereal Transport, our mission, vision and commitment to safe cereal transportation and reliable customer service in Tanzania.')

@section('content')

    <section class="hero" style="padding: 3.5rem 0;">
        <div class="container">
            <span class="hero-eyebrow">About Us</span>
            <h1 class="mt-3">Moving Cereals, Building Trust</h1>
            <p class="lead mt-3">
                Cereal Transport connects farmers, buyers and businesses through dependable
                cereal transportation and supply services across Tanzania.
            </p>
        </div>
    </section>

    <section class="section">
        <div class="container">
            <div class="row align-items-center gy-5">
                <div class="col-lg-6 fade-in-up">
                    <span class="eyebrow">Who We Are</span>
                    <h2>A Business Built Around Cereals</h2>
                    <p>
                        Cereal Transport exists to make moving and supplying cereals simple. We work
                        with customers who already own cereals and need them transported, as well as
                        customers who want to buy quality cereals directly from us — with or without
                        delivery included.
                    </p>
                    <p>
                        Every request goes through a clear process: you tell us what you need, we
                        provide a quotation, and once you accept, our team takes care of the rest.
                    </p>
                </div>
                <div class="col-lg-6 fade-in-up">
                    <div class="hero-image-wrap">
                        <img src="{{ asset('images/zungu2.jpeg') }}"
                            alt="Sacks of cereals stored in a warehouse ready for transport"
                            loading="lazy" width="800" height="600">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="section bg-brand-light">
        <div class="container">
            <div class="row g-4">
                <div class="col-md-4">
                    <div class="card-service fade-in-up">
                        <div class="icon-tile">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"></circle><path d="M12 6v6l4 2"></path></svg>
                        </div>
                        <h3 class="h5">Our Mission</h3>
                        <p>To provide dependable, safe and transparent cereal transportation and
                        supply services that customers can plan around with confidence.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card-service fade-in-up">
                        <div class="icon-tile">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M2 12s4-7 10-7 10 7 10 7-4 7-10 7-10-7-10-7z"></path><circle cx="12" cy="12" r="3"></circle></svg>
                        </div>
                        <h3 class="h5">Our Vision</h3>
                        <p>To become a trusted name in cereal logistics across Tanzania, known for
                        reliability and clear communication at every step.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card-service fade-in-up">
                        <div class="icon-tile">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M20.8 4.6a5.5 5.5 0 0 0-7.8 0L12 5.6l-1-1a5.5 5.5 0 0 0-7.8 7.8l1 1L12 21l7.8-7.6 1-1a5.5 5.5 0 0 0 0-7.8z"></path></svg>
                        </div>
                        <h3 class="h5">Our Core Values</h3>
                        <p>Reliability, safety, honesty and respect for every customer's cereals
                        and time.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="section">
        <div class="container">
            <div class="row gy-5">
                <div class="col-lg-6 fade-in-up">
                    <span class="eyebrow">What We Do</span>
                    <h2>Transportation and Supply, Handled Carefully</h2>
                    <ul class="service-meta-list">
                        <li>Transporting cereals that customers already own, from pickup to
                            destination.</li>
                        <li>Selling company-owned cereals with transportation included.</li>
                        <li>Selling company-owned cereals for customer self-collection.</li>
                        <li>Providing clear quotations before any commitment is made.</li>
                    </ul>
                </div>
                <div class="col-lg-6 fade-in-up">
                    <span class="eyebrow">Our Commitment</span>
                    <h2>Safety and Service, Every Time</h2>
                    <p>
                        We are committed to handling every sack of cereal with care, from the moment
                        it is loaded to the moment it reaches its destination. Just as importantly,
                        we are committed to being reachable and responsive — so customers always know
                        where their request stands.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <section class="section-tight">
        <div class="container">
            <div class="cta-band fade-in-up text-center">
                <h2>Have a Cereal Transport or Supply Need?</h2>
                <p class="mb-4">We're ready to give you a clear quotation.</p>
                <a href="{{ Route::has('requests.create') ? route('requests.create') : url('/request-service') }}"
                class="btn btn-brand btn-lg">Request Service</a>
            </div>
        </div>
    </section>

@endsection
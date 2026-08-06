@extends('layouts.app')

@section('title', 'Our Cereals')
@section('meta_description', 'Browse the cereals available from Cereal Transport, including maize, rice, beans, wheat, sunflower seeds and millet.')

@section('content')

    <section class="hero" style="padding: 3.5rem 0;">
        <div class="container">
            <div class="row align-items-center gy-4">
                <div class="col-lg-7">
                    <span class="hero-eyebrow">Our Cereals</span>
                    <h1 class="mt-3">Quality Cereals, Ready When You Are</h1>
                    <p class="lead mt-3">
                        Below is a sample of the cereals we work with. Submit a request for current
                        availability and pricing.
                    </p>
                </div>
                <div class="col-lg-5">
                    <div class="hero-image-wrap">
                        <img src="{{ asset('images/zungu1.jpeg') }}"
                            alt="Assorted cereals including maize, rice, beans and wheat"
                            loading="lazy" width="800" height="600">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="section">
        <div class="container">

            <div class="alert form-hint bg-brand-light border-0 rounded-3 p-3 mb-4 fade-in-up" role="note">
                Availability and prices may change. Please submit a request to confirm current
                stock and pricing before finalising your order.
            </div>

            {{-- Static placeholder cards for now.
                Later this block can become:
                @foreach ($cereals as $cereal) ... @endforeach --}}
            <div class="row g-4">

                <div class="col-sm-6 col-lg-4">
                    <div class="card-cereal fade-in-up">
                        <div class="card-cereal-image">
                            <svg width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M12 2c3 3 5 6 5 9a5 5 0 0 1-10 0c0-3 2-6 5-9z"></path></svg>
                        </div>
                        <div class="card-cereal-body">
                            <span class="badge-status badge-available mb-2 align-self-start">Available</span>
                            <h3 class="h5">Maize</h3>
                            <p class="flex-grow-1">Dried maize suitable for milling and bulk supply.</p>
                            <p class="mb-1"><strong>Unit:</strong> Per 100kg bag</p>
                            <p class="price mb-3">Contact for price</p>
                            <a href="{{ Route::has('requests.create') ? route('requests.create') : url('/request-service') }}"
                            class="btn btn-outline-green w-100">Request This Cereal</a>
                        </div>
                    </div>
                </div>

                <div class="col-sm-6 col-lg-4">
                    <div class="card-cereal fade-in-up">
                        <div class="card-cereal-image">
                            <svg width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><ellipse cx="12" cy="12" rx="9" ry="5"></ellipse></svg>
                        </div>
                        <div class="card-cereal-body">
                            <span class="badge-status badge-available mb-2 align-self-start">Available</span>
                            <h3 class="h5">Rice</h3>
                            <p class="flex-grow-1">Clean, sorted rice available in bulk quantities.</p>
                            <p class="mb-1"><strong>Unit:</strong> Per 50kg bag</p>
                            <p class="price mb-3">Contact for price</p>
                            <a href="{{ Route::has('requests.create') ? route('requests.create') : url('/request-service') }}"
                            class="btn btn-outline-green w-100">Request This Cereal</a>
                        </div>
                    </div>
                </div>

                <div class="col-sm-6 col-lg-4">
                    <div class="card-cereal fade-in-up">
                        <div class="card-cereal-image">
                            <svg width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><circle cx="9" cy="9" r="2.5"></circle><circle cx="15" cy="9" r="2.5"></circle><circle cx="9" cy="15" r="2.5"></circle><circle cx="15" cy="15" r="2.5"></circle></svg>
                        </div>
                        <div class="card-cereal-body">
                            <span class="badge-status badge-limited mb-2 align-self-start">Limited Stock</span>
                            <h3 class="h5">Beans</h3>
                            <p class="flex-grow-1">Assorted beans, sourced and stored under good
                            conditions.</p>
                            <p class="mb-1"><strong>Unit:</strong> Per 100kg bag</p>
                            <p class="price mb-3">Contact for price</p>
                            <a href="{{ Route::has('requests.create') ? route('requests.create') : url('/request-service') }}"
                            class="btn btn-outline-green w-100">Request This Cereal</a>
                        </div>
                    </div>
                </div>

                <div class="col-sm-6 col-lg-4">
                    <div class="card-cereal fade-in-up">
                        <div class="card-cereal-image">
                            <svg width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M12 2v20M8 6l4-4 4 4M8 18l4 4 4-4"></path></svg>
                        </div>
                        <div class="card-cereal-body">
                            <span class="badge-status badge-available mb-2 align-self-start">Available</span>
                            <h3 class="h5">Wheat</h3>
                            <p class="flex-grow-1">Quality wheat suitable for flour production and
                               bulk supply.</p>
                            <p class="mb-1"><strong>Unit:</strong> Per 100kg bag</p>
                            <p class="price mb-3">Contact for price</p>
                            <a href="{{ Route::has('requests.create') ? route('requests.create') : url('/request-service') }}"
                               class="btn btn-outline-green w-100">Request This Cereal</a>
                        </div>
                    </div>
                </div>

                <div class="col-sm-6 col-lg-4">
                    <div class="card-cereal fade-in-up">
                        <div class="card-cereal-image">
                            <svg width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M12 3v18M12 3c-3 2-3 5 0 7 3 2 3 5 0 7"></path></svg>
                        </div>
                        <div class="card-cereal-body">
                            <span class="badge-status badge-available mb-2 align-self-start">Available</span>
                            <h3 class="h5">Sunflower Seeds</h3>
                            <p class="flex-grow-1">Sunflower seeds suitable for oil pressing and
                               bulk supply.</p>
                            <p class="mb-1"><strong>Unit:</strong> Per 50kg bag</p>
                            <p class="price mb-3">Contact for price</p>
                            <a href="{{ Route::has('requests.create') ? route('requests.create') : url('/request-service') }}"
                               class="btn btn-outline-green w-100">Request This Cereal</a>
                        </div>
                    </div>
                </div>

                <div class="col-sm-6 col-lg-4">
                    <div class="card-cereal fade-in-up">
                        <div class="card-cereal-image">
                            <svg width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><circle cx="12" cy="12" r="2"></circle><circle cx="6" cy="8" r="1.5"></circle><circle cx="18" cy="8" r="1.5"></circle><circle cx="6" cy="16" r="1.5"></circle><circle cx="18" cy="16" r="1.5"></circle></svg>
                        </div>
                        <div class="card-cereal-body">
                            <span class="badge-status badge-limited mb-2 align-self-start">Limited Stock</span>
                            <h3 class="h5">Millet</h3>
                            <p class="flex-grow-1">Millet available in bulk, suitable for milling and
                               direct supply.</p>
                            <p class="mb-1"><strong>Unit:</strong> Per 50kg bag</p>
                            <p class="price mb-3">Contact for price</p>
                            <a href="{{ Route::has('requests.create') ? route('requests.create') : url('/request-service') }}"
                               class="btn btn-outline-green w-100">Request This Cereal</a>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <section class="section-tight bg-brand-light">
        <div class="container">
            <div class="cta-band fade-in-up text-center">
                <h2>Looking for a Specific Cereal or Quantity?</h2>
                <p class="mb-4">Submit a request and we'll confirm availability and pricing with you directly.</p>
                <a href="{{ Route::has('requests.create') ? route('requests.create') : url('/request-service') }}"
                   class="btn btn-brand btn-lg">Request Service</a>
            </div>
        </div>
    </section>

@endsection

@extends('layouts.app')

@section('title', 'Track My Request')

@section('content')
<section class="py-5 bg-light">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-7 col-xl-6">

                <div class="text-center mb-4">
                    <span class="badge text-bg-success mb-3">
                        Request Tracking
                    </span>

                    <h1 class="fw-bold">Track My Request</h1>

                    <p class="text-muted">
                        Enter the request number and phone number used when
                        submitting your request.
                    </p>
                </div>

                <div class="card border-0 shadow-sm">
                    <div class="card-body p-4 p-lg-5">

                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul class="mb-0">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <form
                            method="POST"
                            action="{{ route('requests.track.search') }}"
                        >
                            @csrf

                            <div class="mb-3">
                                <label
                                    for="request_number"
                                    class="form-label fw-semibold"
                                >
                                    Request Number
                                </label>

                                <input
                                    type="text"
                                    class="form-control form-control-lg"
                                    id="request_number"
                                    name="request_number"
                                    value="{{ old('request_number') }}"
                                    placeholder="Example: CTR-2026-00001"
                                    required
                                >
                            </div>

                            <div class="mb-4">
                                <label
                                    for="tracking_phone_display"
                                    class="form-label fw-semibold"
                                >
                                    Phone Number
                                </label>

                                <input
                                    type="tel"
                                    class="form-control form-control-lg"
                                    id="tracking_phone_display"
                                    name="tracking_phone_display"
                                    value="{{ old('tracking_phone_display') }}"
                                    placeholder="Enter the phone number used in your request"
                                    autocomplete="tel"
                                    required
                                >

                                <input
                                    type="hidden"
                                    id="tracking_phone"
                                    name="tracking_phone"
                                    value="{{ old('tracking_phone') }}"
                                >

                                <div
                                id="tracking_phone_error"
                                class="text-danger small mt-2 phone error"
                                >
                                Please enter a valid phone number.
                                </div>
                            </div>

                            <button
                                type="submit"
                                class="btn btn-success btn-lg w-100"
                            >
                                Check Request Status
                            </button>
                        </form>

                    </div>
                </div>

            </div>
        </div>
    </div>
</section>
@endsection
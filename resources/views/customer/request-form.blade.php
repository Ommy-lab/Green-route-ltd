@extends('layouts.app')

@section('title', 'Request Service')

@section('content')
<section class="py-5 bg-light">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-9 col-lg-10">

                <div class="text-center mb-5">
                    <span class="badge text-bg-success mb-3">
                        Service Request
                    </span>

                    <h1 class="fw-bold">Request a Cereal Service</h1>

                    <p class="text-muted mb-0">
                        Select the service you need and provide the required information.
                        Our team will review your request and send you a quotation.
                    </p>
                </div>

                @if (session('success'))
                    <div class="alert alert-success shadow-sm mb-4">
                        <h5 class="fw-bold mb-2">
                            Request Submitted Successfully
                        </h5>

                <p class="mb-2">
                    {{ session('success') }}
                </p>

                <p class="mb-1">
                    <strong>Request Number:</strong>
                {{ session('request_number') }}
                </p>

                <p class="mb-3">
            <strong>Status:</strong>
            <span class="badge text-bg-warning">
                {{ session('request_status') }}
            </span>
                </p>

                <p class="mb-3">
            Your request is waiting for the administrator to provide a price.
                </p>

            <hr>

        <p class="mb-2">
            Save your request number. You will need it together with your phone number
            to check your request status later.
</p>

        <a
            href="{{ route('requests.track.form') }}"
            class="btn btn-outline-success"
        >
            Track My Request
            </a>
        </div>
@endif

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <h6 class="fw-bold">Please correct the following:</h6>

                        <ul class="mb-0">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <div class="card border-0 shadow-sm">
                    <div class="card-body p-4 p-lg-5">

                        <form
                            method="POST"
                            action="{{ route('requests.store') }}"
                            id="serviceRequestForm"
                        >
                            @csrf

                            <div class="mb-4">
                                <label for="service_type" class="form-label fw-semibold">
                                    Select Service
                                </label>

                                <select
                                    class="form-select form-select-lg"
                                    id="service_type"
                                    name="service_type"
                                    required
                                >
                                    <option value="">Choose a service</option>

                                    <option
                                        value="transport_own_cereals"
                                        @selected(old('service_type') === 'transport_own_cereals')
                                    >
                                        Transport my own cereals
                                    </option>

                                    <option
                                        value="buy_with_transport"
                                        @selected(old('service_type') === 'buy_with_transport')
                                    >
                                        Buy company cereals with transportation
                                    </option>

                                    <option
                                        value="buy_without_transport"
                                        @selected(old('service_type') === 'buy_without_transport')
                                    >
                                        Buy company cereals without transportation
                                    </option>
                                </select>
                            </div>

                            <hr class="my-4">

                            <h5 class="fw-bold mb-3">Customer Information</h5>

                            <div class="row g-3">
                                <div class="col-md-6">
                                    <label for="customer_name" class="form-label">
                                        Full Name
                                    </label>

                                    <input
                                        type="text"
                                        class="form-control"
                                        id="customer_name"
                                        name="customer_name"
                                        value="{{ old('customer_name') }}"
                                        required
                                    >
                                </div>

                                <div class="col-md-6">
                                    <label for="phone" class="form-label">
                                        Phone Number
                                    </label>

                                    <input
                                        type="tel"
                                        class="form-control"
                                        id="phone_display"
                                        value="{{ old('phone') }}"
                                        name="phone_display"
                                        placeholder="Enter your phone number"
                                        autocomplete="tel"
                                        required
                                    >
                                    <input
                                        type="hidden"
                                        id="phone"
                                        name="phone"
                                        value="{{ old('phone') }}"
                                    >
                                <div
                                id="tracking_phone_error"
                                class="text-danger small mt-2 phone-error"
                                >
                                Please enter a valid phone number.
                                </div>
                            </div>

                                <div class="col-12">
                                    <label for="email" class="form-label">
                                        Email Address
                                        <span class="text-muted">(optional)</span>
                                    </label>

                                    <input
                                        type="email"
                                        class="form-control"
                                        id="email"
                                        name="email"
                                        value="{{ old('email') }}"
                                    >
                                </div>
                            </div>

                            <hr class="my-4">

                            <h5 class="fw-bold mb-3">Cereal Information</h5>

                            <div class="row g-3">
                                <div class="col-md-6">
                                    <label for="cereal_type" class="form-label">
                                        Cereal Type
                                    </label>

                                    <select
                                        class="form-select"
                                        id="cereal_type"
                                        name="cereal_type"
                                        required
                                    >
                                        <option value="">Select cereal</option>

                                        @foreach (['Maize', 'Rice', 'Beans', 'Wheat', 'Millet', 'Sunflower Seeds', 'Other'] as $cereal)
                                            <option
                                                value="{{ $cereal }}"
                                                @selected(old('cereal_type') === $cereal)
                                            >
                                                {{ $cereal }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="col-md-3">
                                    <label for="quantity" class="form-label">
                                        Quantity
                                    </label>

                                    <input
                                        type="number"
                                        class="form-control"
                                        id="quantity"
                                        name="quantity"
                                        value="{{ old('quantity') }}"
                                        min="0.01"
                                        step="0.01"
                                        required
                                    >
                                </div>

                                <div class="col-md-3">
                                    <label for="unit" class="form-label">
                                        Unit
                                    </label>

                                    <select
                                        class="form-select"
                                        id="unit"
                                        name="unit"
                                        required
                                    >
                                        <option value="">Select</option>

                                        @foreach (['Bags', 'Kilograms', 'Tonnes'] as $unit)
                                            <option
                                                value="{{ $unit }}"
                                                @selected(old('unit') === $unit)
                                            >
                                                {{ $unit }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div id="transportFields">
                                <hr class="my-4">

                                <h5 class="fw-bold mb-3">
                                    Transportation Information
                                </h5>

                                <div class="row g-3">
                                    <div
                                        class="col-md-6"
                                        id="pickupLocationGroup"
                                    >
                                        <label for="pickup_location" class="form-label">
                                            Pickup Location
                                        </label>

                                        <input
                                            type="text"
                                            class="form-control"
                                            id="pickup_location"
                                            name="pickup_location"
                                            value="{{ old('pickup_location') }}"
                                            placeholder="Example: Morogoro"
                                        >
                                    </div>

                                    <div class="col-md-6">
                                        <label for="delivery_location" class="form-label">
                                            Delivery Location
                                        </label>

                                        <input
                                            type="text"
                                            class="form-control"
                                            id="delivery_location"
                                            name="delivery_location"
                                            value="{{ old('delivery_location') }}"
                                            placeholder="Example: Dar es Salaam"
                                        >
                                    </div>

                                    <div class="col-md-6">
                                        <label for="preferred_date" class="form-label">
                                            Preferred Date
                                        </label>

                                        <input
                                            type="date"
                                            class="form-control"
                                            id="preferred_date"
                                            name="preferred_date"
                                            value="{{ old('preferred_date') }}"
                                            min="{{ now()->toDateString() }}"
                                        >
                                    </div>
                                </div>
                            </div>

                            <div class="mt-4">
                                <label for="message" class="form-label">
                                    Additional Information
                                    <span class="text-muted">(optional)</span>
                                </label>

                                <textarea
                                    class="form-control"
                                    id="message"
                                    name="message"
                                    rows="4"
                                    placeholder="Provide any additional information about the request."
                                >{{ old('message') }}</textarea>
                            </div>

                            <div class="alert alert-success mt-4 mb-0">
                                After submitting, your request will show
                                <strong>Pending Price</strong>. Our administrator will
                                review it and prepare a quotation.
                            </div>

                            <button
                                type="submit"
                                class="btn btn-success btn-lg w-100 mt-4"
                            >
                                Submit Request
                            </button>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
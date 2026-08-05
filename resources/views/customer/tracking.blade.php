@extends('layouts.app')

@section('title', 'Track Request')

@section('content')
<section class="py-5 bg-light">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">

                <div class="card border-0 shadow-sm">
                    <div class="card-body p-4 p-lg-5">
                        <div class="card border-0 shadow-sm">
    <div class="card-body p-4 p-lg-5">

        {{-- Success Message --}}
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        {{-- Validation Errors --}}
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif



                        <div class="text-center mb-4">
                            <div
                                class="d-inline-flex align-items-center justify-content-center
                                    rounded-circle bg-warning-subtle text-warning-emphasis mb-3"
                                style="width: 70px; height: 70px;"
                            >
                                <span class="fs-2">⏳</span>
                            </div>

                            <h1 class="h3 fw-bold">
                                Request Submitted Successfully
                            </h1>

                            <p class="text-muted">
                                Your request has been received and is waiting
                                for the administrator to provide a price.
                            </p>
                        </div>

                            @php
                                    $statusClass = match($serviceRequest->status) {
                                    'Pending Price' => 'warning',
                                    'Price Sent' => 'info',
                                    'Accepted' => 'success',
                                    'Rejected' => 'danger',
                                    'In Progress' => 'primary',
                                    'Completed' => 'success',
                                    default => 'secondary',
                            };
                            @endphp

                <div class="alert alert-{{ $statusClass }} text-center">
                    <strong>Status:</strong>
                    {{ $serviceRequest->status }}
                </div>

                        <div class="row g-3">
                            <div class="col-md-6">
                                <div class="border rounded p-3 h-100">
                                    <small class="text-muted">
                                        Request Number
                                    </small>

                                    <div class="fw-bold">
                                        {{ $serviceRequest->request_number }}
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="border rounded p-3 h-100">
                                    <small class="text-muted">
                                        Customer Name
                                    </small>

                                    <div class="fw-bold">
                                        {{ $serviceRequest->customer_name }}
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="border rounded p-3 h-100">
                                    <small class="text-muted">
                                        Service
                                    </small>

                                    <div class="fw-bold">
                                        {{ str($serviceRequest->service_type)->replace('_', ' ')->title() }}
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="border rounded p-3 h-100">
                                    <small class="text-muted">
                                        Cereal
                                    </small>

                                    <div class="fw-bold">
                                        {{ $serviceRequest->cereal_type }}
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="border rounded p-3 h-100">
                                    <small class="text-muted">
                                        Quantity
                                    </small>

                                    <div class="fw-bold">
                                        {{ $serviceRequest->quantity }}
                                        {{ $serviceRequest->unit }}
                                    </div>
                                </div>
                            </div>

                            @if ($serviceRequest->delivery_location)
                                <div class="col-md-6">
                                    <div class="border rounded p-3 h-100">
                                        <small class="text-muted">
                                            Delivery Location
                                        </small>

                                        <div class="fw-bold">
                                            {{ $serviceRequest->delivery_location }}
                                        </div>
                                    </div>
                                </div>
                            @endif
                        </div>

                        @if($serviceRequest->quotation)

                        <div class="card border-success mt-4">

                        <div class="card-header bg-success text-white">
                    <h5 class="mb-0">
            Quotation Details
        </h5>
    </div>

    <div class="card-body">

        <table class="table table-borderless">

            @if($serviceRequest->quotation->cereal_cost > 0)
            <tr>
                <td>Cereal Cost</td>
                <td class="text-end">
                    TZS {{ number_format($serviceRequest->quotation->cereal_cost,2) }}
                </td>
            </tr>
            @endif

            @if($serviceRequest->quotation->transport_cost > 0)
            <tr>
                <td>Transportation</td>
                <td class="text-end">
                    TZS {{ number_format($serviceRequest->quotation->transport_cost,2) }}
                </td>
            </tr>
            @endif

            @if($serviceRequest->quotation->loading_cost > 0)
            <tr>
                <td>Loading</td>
                <td class="text-end">
                    TZS {{ number_format($serviceRequest->quotation->loading_cost,2) }}
                </td>
            </tr>
            @endif

            @if($serviceRequest->quotation->other_cost > 0)
            <tr>
                <td>Other Charges</td>
                <td class="text-end">
                    TZS {{ number_format($serviceRequest->quotation->other_cost,2) }}
                </td>
            </tr>
            @endif

            @if($serviceRequest->quotation->discount > 0)
            <tr>
                <td>Discount</td>
                <td class="text-end text-danger">
                    -TZS {{ number_format($serviceRequest->quotation->discount,2) }}
                </td>
            </tr>
            @endif

            <tr class="table-success fw-bold">
                <td>Total Price</td>
                <td class="text-end">
                    TZS {{ number_format($serviceRequest->quotation->total_price,2) }}
                </td>
            </tr>

        </table>

        <hr>

        <p>
            <strong>Estimated Delivery</strong><br>
            {{ $serviceRequest->quotation->estimated_delivery }}
        </p>

        <p>
            <strong>Valid Until</strong><br>
            {{ optional($serviceRequest->quotation->valid_until)->format('d M Y') }}
        </p>

        <p class="mb-0">
            <strong>Administrator Notes</strong><br>
            {{ $serviceRequest->quotation->notes }}
        </p>

    </div>

</div>

@endif

@if(
    $serviceRequest->quotation &&
    $serviceRequest->status === 'Price Sent' &&
    $serviceRequest->quotation->customer_decision === 'Pending'
)

<div class="d-flex gap-3 mt-4">

    <form
    method="POST"
    action="{{ route('quotation.accept', $serviceRequest->quotation) }}"
>
        @csrf

        <button
        type="submit"
        class="btn btn-success w-100"
        onclick="return confirm('Accept this quotation?')">
            Accept Quotation
        </button>
    </form>
</div>

<div class="col-md-7">
                <form
                    method="POST"
                    action="{{ route(
                        'quotation.reject',
                        $serviceRequest->quotation
                    ) }}"
                >
                    @csrf

                    <div class="mb-2">
                        <label
                            for="rejection_reason"
                            class="form-label"
                        >
                            Rejection reason
                            <span class="text-muted">(optional)</span>
                        </label>

                        <textarea
                            class="form-control"
                            id="rejection_reason"
                            name="rejection_reason"
                            rows="2"
                            maxlength="1000"
                        >{{ old('rejection_reason') }}</textarea>
                    </div>

                    <button
                        type="submit"
                        class="btn btn-outline-danger w-100"
                        onclick="return confirm('Reject this quotation?')"
                    >
                        Reject Quotation
                    </button>
                </form>
            </div>

        </div>
    </div>
@endif

{{-- ADD THE REJECTION MESSAGE HERE --}}
@if (
    $serviceRequest->quotation &&
    $serviceRequest->quotation->customer_decision === 'Rejected'
)
    <div class="alert alert-danger mt-4">
        <h6 class="fw-bold">
            Quotation Rejected
        </h6>

        <p class="mb-0">
            <strong>Reason:</strong>

            {{ $serviceRequest->quotation->rejection_reason
                ?: 'No rejection reason was provided.' }}
        </p>
    </div>
@endif

    @if($serviceRequest->status === 'Pending Price')

<div class="alert alert-success mt-4 mb-0">
    Save your request number and this page link.
    You will use them to view the quotation once the
    administrator has submitted a price.
</div>

@elseif($serviceRequest->status === 'Price Sent')

<div class="alert alert-info mt-4 mb-0">
    A quotation has been prepared for your request.
    Please review it carefully and decide whether to accept it.
</div>

@elseif($serviceRequest->status === 'Accepted')

<div class="alert alert-success mt-4 mb-0">
    Thank you for accepting the quotation.
    Our team will contact you shortly.
</div>

@elseif($serviceRequest->status === 'Rejected')

<div class="alert alert-danger mt-4 mb-0">
    You rejected this quotation.
    If you still need the service, please contact our team.
</div>

@elseif($serviceRequest->status === 'Completed')

<div class="alert alert-primary mt-4 mb-0">
    Your request has been completed successfully.
    Thank you for choosing our services.
</div>

@elseif($serviceRequest->status === 'In Progress')

<div class="alert alert-primary mt-4 mb-0">
    <h6 class="fw-bold mb-1">
        Your request is in progress
    </h6>

    <p class="mb-0">
        Your order or transportation service is currently being prepared.
        Our team will contact you if any additional information is required.
    </p>
</div>

@elseif($serviceRequest->status === 'Completed')

<div class="alert alert-success mt-4 mb-0">
    <h6 class="fw-bold mb-1">
        Request completed successfully
    </h6>

    <p class="mb-0">
        Your request has been completed successfully.
        Thank you for choosing our services.
    </p>
</div>

@endif

                        <div class="d-flex flex-wrap gap-3 mt-4">
                            <a
                                href="{{ route('requests.track', $serviceRequest->tracking_token) }}"
                                class="btn btn-success"
                            >
                                Refresh Request Status
                            </a>

                            <a
                                href="{{ route('home') }}"
                                class="btn btn-outline-secondary"
                            >
                                Return Home
                            </a>
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </div>
</section>
@endsection
@extends('layouts.admin')

@section('title', 'Request Details')
@section('page_title', 'Request Details')

@section('content')
<div class="container-fluid">

    {{-- Page header --}}
    <div class="d-flex flex-wrap justify-content-between align-items-center gap-3 mb-4">
        <div>
            <p class="text-success fw-semibold mb-1">
                Customer Request
            </p>

            <h1 class="h3 fw-bold mb-1">
                {{ $serviceRequest->request_number }}
            </h1>

            <p class="text-muted mb-0">
                Submitted {{ $serviceRequest->created_at->format('d M Y, H:i') }}
            </p>
        </div>

        <a
            href="{{ route('admin.requests.index') }}"
            class="btn btn-outline-secondary"
        >
            Back to Requests
        </a>
    </div>

    {{-- Flash messages --}}
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    @php
        $statusClass = match ($serviceRequest->status) {
            'Pending Price' => 'text-bg-warning',
            'Price Sent' => 'text-bg-info',
            'Accepted' => 'text-bg-success',
            'Rejected' => 'text-bg-danger',
            'In Progress' => 'text-bg-primary',
            'Completed' => 'text-bg-dark',
            default => 'text-bg-secondary',
        };
    @endphp

    <div class="row g-4">

        {{-- Main request information --}}
        <div class="col-xl-8">

            <div class="card border-0 shadow-sm mb-4">
                <div class="card-header bg-white py-3">
                    <h2 class="h5 fw-bold mb-0">
                        Customer Information
                    </h2>
                </div>

                <div class="card-body">
                    <div class="row g-3">

                        <div class="col-md-6">
                            <small class="text-muted">
                                Customer Name
                            </small>

                            <div class="fw-semibold">
                                {{ $serviceRequest->customer_name }}
                            </div>
                        </div>

                        <div class="col-md-6">
                            <small class="text-muted">
                                Phone Number
                            </small>

                            <div class="fw-semibold">
                                {{ $serviceRequest->phone }}
                            </div>
                        </div>

                        <div class="col-md-6">
                            <small class="text-muted">
                                Email Address
                            </small>

                            <div class="fw-semibold">
                                {{ $serviceRequest->email ?: 'Not provided' }}
                            </div>
                        </div>

                        <div class="col-md-6">
                            <small class="text-muted">
                                Current Status
                            </small>

                            <div>
                                <span class="badge {{ $statusClass }}">
                                    {{ $serviceRequest->status }}
                                </span>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

            <div class="card border-0 shadow-sm mb-4">
                <div class="card-header bg-white py-3">
                    <h2 class="h5 fw-bold mb-0">
                        Service Information
                    </h2>
                </div>

                <div class="card-body">
                    <div class="row g-3">

                        <div class="col-md-6">
                            <small class="text-muted">
                                Service Type
                            </small>

                            <div class="fw-semibold">
                                {{ str($serviceRequest->service_type)
                                    ->replace('_', ' ')
                                    ->title() }}
                            </div>
                        </div>

                        <div class="col-md-6">
                            <small class="text-muted">
                                Cereal Type
                            </small>

                            <div class="fw-semibold">
                                {{ $serviceRequest->cereal_type }}
                            </div>
                        </div>

                        <div class="col-md-6">
                            <small class="text-muted">
                                Quantity
                            </small>

                            <div class="fw-semibold">
                                {{ $serviceRequest->quantity }}
                                {{ $serviceRequest->unit }}
                            </div>
                        </div>

                        <div class="col-md-6">
                            <small class="text-muted">
                                Preferred Date
                            </small>

                            <div class="fw-semibold">
                                {{ $serviceRequest->preferred_date
                                    ? $serviceRequest->preferred_date->format('d M Y')
                                    : 'Not provided' }}
                            </div>
                        </div>

                        <div class="col-md-6">
                            <small class="text-muted">
                                Pickup Location
                            </small>

                            <div class="fw-semibold">
                                {{ $serviceRequest->pickup_location ?: 'Not required' }}
                            </div>
                        </div>

                        <div class="col-md-6">
                            <small class="text-muted">
                                Delivery Location
                            </small>

                            <div class="fw-semibold">
                                {{ $serviceRequest->delivery_location ?: 'Not required' }}
                            </div>
                        </div>

                        <div class="col-12">
                            <small class="text-muted">
                                Additional Message
                            </small>

                            <div class="border rounded bg-light p-3 mt-1">
                                {{ $serviceRequest->message ?: 'No additional message provided.' }}
                            </div>
                        </div>

                    </div>
                </div>
            </div>

            {{-- Rejection details --}}
            @if (
                $serviceRequest->quotation &&
                $serviceRequest->quotation->customer_decision === 'Rejected'
            )
                <div class="card border-danger shadow-sm mb-4">
                    <div class="card-header bg-danger text-white py-3">
                        <h2 class="h5 mb-0">
                            Rejection Details
                        </h2>
                    </div>

                    <div class="card-body">
                        <p class="mb-2">
                            <strong>Customer decision:</strong>
                            Rejected
                        </p>

                        <p class="mb-0">
                            <strong>Reason:</strong>
                            {{ $serviceRequest->quotation->rejection_reason
                                ?: 'No rejection reason was provided.' }}
                        </p>
                    </div>
                </div>
            @endif

            {{-- Request progress --}}
            @if (in_array($serviceRequest->status, ['Accepted', 'In Progress']))
                <div class="card border-0 shadow-sm mb-4">
                    <div class="card-header bg-white py-3">
                        <h2 class="h5 fw-bold mb-0">
                            Update Request Progress
                        </h2>
                    </div>

                    <div class="card-body">
                        <form
                            method="POST"
                            action="{{ route(
                                'admin.requests.status.update',
                                $serviceRequest
                            ) }}"
                        >
                            @csrf
                            @method('PATCH')

                            <div class="mb-3">
                                <label
                                    for="status"
                                    class="form-label fw-semibold"
                                >
                                    New Status
                                </label>

                                <select
                                    id="status"
                                    name="status"
                                    class="form-select"
                                    required
                                >
                                    <option value="">
                                        Select new status
                                    </option>

                                    @if ($serviceRequest->status === 'Accepted')
                                        <option value="In Progress">
                                            In Progress
                                        </option>
                                    @endif

                                    @if ($serviceRequest->status === 'In Progress')
                                        <option value="Completed">
                                            Completed
                                        </option>
                                    @endif
                                </select>
                            </div>

                            <button
                                type="submit"
                                class="btn btn-primary"
                            >
                                Update Progress
                            </button>
                        </form>
                    </div>
                </div>
            @endif

        </div>

        {{-- Quotation panel --}}
        <div class="col-xl-4">

            <div class="card border-0 shadow-sm">
                <div class="card-header bg-white py-3">
                    <h2 class="h5 fw-bold mb-0">
                        {{ $serviceRequest->quotation
                            ? 'Update Quotation'
                            : 'Create Quotation' }}
                    </h2>
                </div>

                <div class="card-body">

                    @if (
                        $serviceRequest->quotation &&
                        $serviceRequest->quotation->customer_decision !== 'Pending'
                    )
                        <div class="alert alert-info">
                            The customer has already made a decision on this quotation.
                        </div>
                    @endif

                    <form
                        method="POST"
                        action="{{ route(
                            'admin.requests.quotation.store',
                            $serviceRequest
                        ) }}"
                    >
                        @csrf

                        @if (
                            in_array(
                                $serviceRequest->service_type,
                                ['buy_with_transport', 'buy_without_transport']
                            )
                        )
                            <div class="mb-3">
                                <label
                                    for="cereal_cost"
                                    class="form-label fw-semibold"
                                >
                                    Cereal Cost
                                </label>

                                <input
                                    type="number"
                                    id="cereal_cost"
                                    name="cereal_cost"
                                    class="form-control quotation-value"
                                    min="0"
                                    step="0.01"
                                    value="{{ old(
                                        'cereal_cost',
                                        $serviceRequest->quotation?->cereal_cost ?? 0
                                    ) }}"
                                >
                            </div>
                        @endif

                        @if (
                            in_array(
                                $serviceRequest->service_type,
                                ['transport_own_cereals', 'buy_with_transport']
                            )
                        )
                            <div class="mb-3">
                                <label
                                    for="transport_cost"
                                    class="form-label fw-semibold"
                                >
                                    Transportation Cost
                                </label>

                                <input
                                    type="number"
                                    id="transport_cost"
                                    name="transport_cost"
                                    class="form-control quotation-value"
                                    min="0"
                                    step="0.01"
                                    value="{{ old(
                                        'transport_cost',
                                        $serviceRequest->quotation?->transport_cost ?? 0
                                    ) }}"
                                >
                            </div>
                        @endif

                        <div class="mb-3">
                            <label
                                for="loading_cost"
                                class="form-label fw-semibold"
                            >
                                Loading Cost
                            </label>

                            <input
                                type="number"
                                id="loading_cost"
                                name="loading_cost"
                                class="form-control quotation-value"
                                min="0"
                                step="0.01"
                                value="{{ old(
                                    'loading_cost',
                                    $serviceRequest->quotation?->loading_cost ?? 0
                                ) }}"
                            >
                        </div>

                        <div class="mb-3">
                            <label
                                for="other_cost"
                                class="form-label fw-semibold"
                            >
                                Other Charges
                            </label>

                            <input
                                type="number"
                                id="other_cost"
                                name="other_cost"
                                class="form-control quotation-value"
                                min="0"
                                step="0.01"
                                value="{{ old(
                                    'other_cost',
                                    $serviceRequest->quotation?->other_cost ?? 0
                                ) }}"
                            >
                        </div>

                        <div class="mb-3">
                            <label
                                for="discount"
                                class="form-label fw-semibold"
                            >
                                Discount
                            </label>

                            <input
                                type="number"
                                id="discount"
                                name="discount"
                                class="form-control quotation-value"
                                min="0"
                                step="0.01"
                                value="{{ old(
                                    'discount',
                                    $serviceRequest->quotation?->discount ?? 0
                                ) }}"
                            >
                        </div>

                        <div class="alert alert-light border">
                            <small class="text-muted">
                                Total Price
                            </small>

                            <div class="fs-4 fw-bold text-success">
                                TZS
                                <span id="quotationTotal">
                                    {{ number_format(
                                        $serviceRequest->quotation?->total_price ?? 0,
                                        2
                                    ) }}
                                </span>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label
                                for="estimated_delivery"
                                class="form-label fw-semibold"
                            >
                                Estimated Delivery
                            </label>

                            <input
                                type="text"
                                id="estimated_delivery"
                                name="estimated_delivery"
                                class="form-control"
                                maxlength="100"
                                placeholder="Example: Within 2 days"
                                value="{{ old(
                                    'estimated_delivery',
                                    $serviceRequest->quotation?->estimated_delivery
                                ) }}"
                            >
                        </div>

                        <div class="mb-3">
                            <label
                                for="valid_until"
                                class="form-label fw-semibold"
                            >
                                Quotation Valid Until
                            </label>

                            <input
                                type="date"
                                id="valid_until"
                                name="valid_until"
                                class="form-control"
                                min="{{ now()->toDateString() }}"
                                value="{{ old(
                                    'valid_until',
                                    $serviceRequest->quotation?->valid_until?->format('Y-m-d')
                                ) }}"
                            >
                        </div>

                        <div class="mb-4">
                            <label
                                for="notes"
                                class="form-label fw-semibold"
                            >
                                Administrator Notes
                            </label>

                            <textarea
                                id="notes"
                                name="notes"
                                class="form-control"
                                rows="4"
                                maxlength="2000"
                                placeholder="Add important quotation details."
                            >{{ old(
                                'notes',
                                $serviceRequest->quotation?->notes
                            ) }}</textarea>
                        </div>

                        <button
                            type="submit"
                            class="btn btn-success w-100"
                            @disabled(
                                $serviceRequest->quotation &&
                                $serviceRequest->quotation->customer_decision !== 'Pending'
                            )
                        >
                            {{ $serviceRequest->quotation
                                ? 'Update Quotation'
                                : 'Send Quotation' }}
                        </button>
                    </form>

                </div>
            </div>

            {{-- Existing quotation summary --}}
            @if ($serviceRequest->quotation)
                <div class="card border-0 shadow-sm mt-4">
                    <div class="card-header bg-white py-3">
                        <h2 class="h5 fw-bold mb-0">
                            Current Quotation
                        </h2>
                    </div>

                    <div class="card-body">
                        <p class="mb-2">
                            <strong>Total:</strong>
                            TZS {{ number_format(
                                $serviceRequest->quotation->total_price,
                                2
                            ) }}
                        </p>

                        <p class="mb-2">
                            <strong>Customer decision:</strong>
                            {{ $serviceRequest->quotation->customer_decision }}
                        </p>

                        <p class="mb-0">
                            <strong>Valid until:</strong>
                            {{ $serviceRequest->quotation->valid_until
                                ? $serviceRequest->quotation->valid_until->format('d M Y')
                                : 'Not specified' }}
                        </p>
                    </div>
                </div>
            @endif

        </div>
    </div>
</div>
@endsection

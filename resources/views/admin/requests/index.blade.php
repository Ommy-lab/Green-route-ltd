@extends('layouts.admin')

@section('title', 'Customer Requests')
@section('page_title', 'Customer Requests')

@section('content')
<div class="container-fluid">

    <div class="d-flex flex-wrap justify-content-between align-items-center gap-3 mb-4">
        <div>
            <p class="text-success fw-semibold mb-1">
                Request Management
            </p>

            <h1 class="h3 fw-bold mb-1">
                {{ $status ?: 'All Customer Requests' }}
            </h1>

            <p class="text-muted mb-0">
                Search, filter and manage customer requests.
            </p>
        </div>

        <a
            href="{{ route('admin.dashboard') }}"
            class="btn btn-outline-secondary"
        >
            Back to Dashboard
        </a>
    </div>

    <div class="card border-0 shadow-sm mb-4">
        <div class="card-body">

            <form
                method="GET"
                action="{{ route('admin.requests.index') }}"
                class="row g-3 align-items-end"
            >
                <div class="col-lg-6">
                    <label for="search" class="form-label">
                        Search Requests
                    </label>

                    <input
                        type="search"
                        id="search"
                        name="search"
                        class="form-control"
                        value="{{ $search }}"
                        placeholder="Request number, customer, phone or cereal"
                    >
                </div>

                <div class="col-lg-4">
                    <label for="status" class="form-label">
                        Status
                    </label>

                    <select
                        id="status"
                        name="status"
                        class="form-select"
                    >
                        <option value="">All statuses</option>

                        @foreach ($allowedStatuses as $requestStatus)
                            <option
                                value="{{ $requestStatus }}"
                                @selected($status === $requestStatus)
                            >
                                {{ $requestStatus }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="col-lg-2">
                    <button
                        type="submit"
                        class="btn btn-success w-100"
                    >
                        Filter
                    </button>
                </div>
            </form>

            @if ($status || $search)
                <div class="mt-3">
                    <a
                        href="{{ route('admin.requests.index') }}"
                        class="btn btn-sm btn-outline-secondary"
                    >
                        Clear Filters
                    </a>
                </div>
            @endif

        </div>
    </div>

    <div class="card border-0 shadow-sm">

        <div class="card-header bg-white py-3">
            <h2 class="h5 fw-bold mb-0">
                Requests
            </h2>
        </div>

        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">

                <thead class="table-light">
                    <tr>
                        <th scope="col">Request</th>
                        <th scope="col">Customer</th>
                        <th scope="col">Service</th>
                        <th scope="col">Cereal</th>
                        <th scope="col">Quantity</th>
                        <th scope="col">Route</th>
                        <th scope="col">Status</th>
                        <th scope="col">Submitted</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse ($requests as $serviceRequest)
                        <tr>
                            <td class="fw-semibold">
                                {{ $serviceRequest->request_number }}
                            </td>

                            <td>
                                <div class="fw-semibold">
                                    {{ $serviceRequest->customer_name }}
                                </div>

                                <small class="text-muted">
                                    {{ $serviceRequest->phone }}
                                </small>
                            </td>

                            <td>
                                {{ str($serviceRequest->service_type)
                                    ->replace('_', ' ')
                                    ->title() }}
                            </td>

                            <td>
                                {{ $serviceRequest->cereal_type }}
                            </td>

                            <td>
                                {{ $serviceRequest->quantity }}
                                {{ $serviceRequest->unit }}
                            </td>

                            <td>
                                @if (
                                    $serviceRequest->pickup_location ||
                                    $serviceRequest->delivery_location
                                )
                                    {{ $serviceRequest->pickup_location ?: '—' }}
                                    →
                                    {{ $serviceRequest->delivery_location ?: '—' }}
                                @else
                                    —
                                @endif
                            </td>

                            <td>
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

                                <span class="badge {{ $statusClass }}">
                                    {{ $serviceRequest->status }}
                                </span>
                            </td>

                            <td>
                                {{ $serviceRequest->created_at->format('d M Y') }}
                            </td>

                            <td>
                                <a
                                    href="{{ route(
                                        'admin.requests.show',
                                        $serviceRequest
                                    ) }}"
                                    class="btn btn-sm btn-success"
                                >
                                    View
                                </a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td
                                colspan="9"
                                class="text-center py-5"
                            >
                                <h3 class="h5 fw-bold">
                                    No requests found
                                </h3>

                                <p class="text-muted mb-0">
                                    Try changing the search or status filter.
                                </p>
                            </td>
                        </tr>
                    @endforelse
                </tbody>

            </table>
        </div>

        @if ($requests->hasPages())
            <div class="card-footer bg-white">
                {{ $requests->links() }}
            </div>
        @endif

    </div>
</div>
@endsection
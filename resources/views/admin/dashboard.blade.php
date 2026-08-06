@extends('layouts.admin')

@section('title', 'Dashboard')
@section('page_title', 'Dashboard')

@section('content')

    {{-- ===================== 1. WELCOME HEADER ===================== --}}
    <div class="admin-welcome fade-in-up">
        <div>
            <h2>Administrator Dashboard</h2>
            <p class="mb-1">
    Welcome back,
    <strong>{{ auth()->user()->name ?? 'Administrator' }}</strong>

    @if (auth()->user()->role === 'super_admin')
        <span class="badge text-bg-dark ms-2">
            Super Administrator
        </span>
    @else
        <span class="badge text-bg-success ms-2">
            Administrator
        </span>
    @endif

    — here's what's happening with customer requests today.
</p>
            <p class="admin-welcome-date">{{ now()->format('l, d F Y') }}</p>
        </div>
        <div class="admin-welcome-actions">
            <a href="{{ route('home') }}" class="btn btn-outline-green" target="_blank" rel="noopener">
                View Public Website

            {{-- Connect to admin.requests.index when the route is created --}}
            <a href="{{ route('admin.requests.index') }}" class="btn btn-sm btn-success">
                View All Requests
</a>
        </div>
    </div>

    {{-- ===================== 2. STATISTICS CARDS ===================== --}}
    <div class="admin-stats-grid fade-in-up">
        @include('admin.components.stat-card', [
            'label' => 'Total Requests',
            'value' => $statistics['total'],
            'description' => 'All requests received',
            'variant' => 'primary',
            'icon' => 'list',
        ])

        @include('admin.components.stat-card', [
            'label' => 'Pending Price',
            'value' => $statistics['pending'],
            'description' => 'Awaiting a quotation',
            'variant' => 'warning',
            'icon' => 'clock',
        ])

        @include('admin.components.stat-card', [
            'label' => 'Accepted',
            'value' => $statistics['accepted'],
            'description' => 'Confirmed by customers',
            'variant' => 'success',
            'icon' => 'check',
        ])

        @include('admin.components.stat-card', [
            'label' => 'Rejected',
            'value' => $statistics['rejected'],
            'description' => 'Declined by customers',
            'variant' => 'danger',
            'icon' => 'x',
        ])

        @include('admin.components.stat-card', [
            'label' => 'Completed',
            'value' => $statistics['completed'],
            'description' => 'Fully delivered requests',
            'variant' => 'dark-green',
            'icon' => 'check-double',
        ])
    </div>

    {{-- ===================== 3. QUICK ACTIONS ===================== --}}
    <div class="admin-panel fade-in-up">
        <div class="admin-panel-header">
            <h3>Quick Actions</h3>
        </div>
        <div class="admin-quick-actions">
            {{-- Connect to admin.requests.pending when the route is created --}}
            <a href="{{  route('admin.requests.index' , ['status' => 'pending price']) }}" class="admin-quick-action">
                <div class="admin-quick-icon admin-quick-icon--warning">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"></circle><path d="M12 6v6l4 2"></path></svg>
                </div>
                <span>Review Pending Requests</span>
            </a>

            {{-- Connect to admin.requests.accepted when the route is created --}}
            <a href="{{ route('admin.requests.index', ['status' => 'Accepted']) }}" class="admin-quick-action">
                <div class="admin-quick-icon admin-quick-icon--success">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M9 11l3 3L22 4"></path><path d="M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11"></path></svg>
                </div>
                <span>View Accepted Requests</span>
            </a>

            {{-- Connect to admin.cereals.index when the route is created --}}
            <a href="{{ route('admin.cereals.index') }}" class="admin-quick-action">
                <div class="admin-quick-icon admin-quick-icon--primary">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 2c3 3 5 6 5 9a5 5 0 0 1-10 0c0-3 2-6 5-9z"></path></svg>
                </div>
                <span>Manage Cereals</span>
            </a>

            {{-- Connect to admin.requests.completed when the route is created --}}
            <a href="{{ route('admin.requests.index', ['status' => 'Completed']) }}" class="admin-quick-action">
                <div class="admin-quick-icon admin-quick-icon--dark-green">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M18 6 7 17l-5-5"></path></svg>
                </div>
                <span>View Completed Deliveries</span>
            </a>

            <a href="{{ route('home') }}" class="admin-quick-action" target="_blank" rel="noopener">
                <div class="admin-quick-icon admin-quick-icon--muted">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"></circle><line x1="2" y1="12" x2="22" y2="12"></line><path d="M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z"></path></svg>
                </div>
                <span>Open Public Website</span>
            </a>
        </div>
    </div>

    <div class="row g-4">

        {{-- ===================== 4. CUSTOMER REQUESTS TABLE ===================== --}}
        <div class="col-xl-8">
            <div class="admin-panel fade-in-up h-100">
                <div class="admin-panel-header">
                    <h3>Customer Requests</h3>
                    {{-- Connect to admin.requests.index when the route is created --}}
                    <a href="{{ route('admin.requests.index') }}" class="admin-panel-link">View all</a>
                </div>

                @forelse ($requests as $request)
                    @if ($loop->first)
                        <div class="table-responsive admin-table-wrap">
                        <table class="table admin-table" aria-label="Customer requests">
                            <thead>
                                <tr>
                                    <th scope="col">Request #</th>
                                    <th scope="col">Customer</th>
                                    <th scope="col">Phone</th>
                                    <th scope="col">Service</th>
                                    <th scope="col">Cereal</th>
                                    <th scope="col">Qty</th>
                                    <th scope="col">Route</th>
                                    <th scope="col">Preferred Date</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Submitted</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                    @endif

                                <tr>
                                    <td class="fw-semibold">{{ $request->request_number }}</td>
                                    <td>{{ $request->customer_name }}</td>
                                    <td>{{ $request->phone }}</td>
                                    <td>
                                        @php
                                            $serviceLabels = [
                                                'transport_own_cereals' => 'Transport Own Cereals',
                                                'buy_with_transport' => 'Buy With Transport',
                                                'buy_without_transport' => 'Buy Without Transport',
                                            ];
                                        @endphp
                                        {{ $serviceLabels[$request->service_type] ?? $request->service_type }}
                                    </td>
                                    <td>{{ $request->cereal_type }}</td>
                                    <td>{{ $request->quantity }} {{ $request->unit }}</td>
                                    <td>
                                        @if ($request->pickup_location || $request->delivery_location)
                                            <span class="admin-route">
                                                {{ $request->pickup_location ?? '—' }}
                                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" width="12" height="12"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>
                                                {{ $request->delivery_location ?? '—' }}
                                            </span>
                                        @else
                                            <span class="text-muted">—</span>
                                        @endif
                                    </td>
                                    <td>
                                        {{ $request->preferred_date ? \Illuminate\Support\Carbon::parse($request->preferred_date)->format('d M Y') : '—' }}
                                    </td>
                                    <td>
                                        @include('admin.components.status-badge', ['status' => $request->status])
                                    </td>
                                    <td>{{ $request->created_at->format('d M Y') }}</td>
                                    <td>
                                        <div class="admin-table-actions">
                                            {{-- Connect to admin.requests.show when the route is created --}}
                                            <a
                                                href="{{ route('admin.requests.show', $request) }}"
                                                    class="admin-table-btn"
                                                        aria-label="View request {{ $request->request_number }}"
                                                        >
                                                        View
</a>
                                            </a>
                                            @if ($request->status === 'Pending Price')
                                                {{-- Connect to admin.requests.quote when the route is created --}}
                                                <a href="#" class="admin-table-btn admin-table-btn--brand">
                                                    Send Quotation
                                                </a>
                                            @endif
                                        </div>
                                    </td>
                                </tr>

                    @if ($loop->last)
                            </tbody>
                        </table>
                        </div>
                    @endif
                @empty
                    @include('admin.components.empty-state')
                @endforelse

                @if ($requests->hasPages())
                    <div class="admin-pagination">
                        {{ $requests->links() }}
                    </div>
                @endif
            </div>
        </div>

        <div class="col-xl-4">

            {{-- ===================== 8. RECENT ACTIVITY ===================== --}}
            <div class="admin-panel fade-in-up mb-4">
                <div class="admin-panel-header">
                    <h3>Recent Activity</h3>
                </div>

                @forelse ($requests->take(5) as $request)
                    <div class="admin-activity-item">
                        <div class="admin-activity-dot"></div>
                        <div>
                            <p class="mb-1">
                                <strong>{{ $request->request_number }}</strong> submitted by
                                {{ $request->customer_name }}
                            </p>
                            <p class="admin-activity-meta">
                                @include('admin.components.status-badge', ['status' => $request->status])
                                <span>{{ $request->created_at->diffForHumans() }}</span>
                            </p>
                        </div>
                    </div>
                @empty
                    <p class="text-muted mb-0">No recent activity yet.</p>
                @endforelse
            </div>

            {{-- ===================== 9. BUSINESS OVERVIEW ===================== --}}
            <div class="admin-panel fade-in-up">
                <div class="admin-panel-header">
                    <h3>Business Overview</h3>
                </div>

                <ul class="admin-overview-list">
                    <li>
                        <span>Awaiting quotation</span>
                        <strong>{{ $statistics['pending'] }}</strong>
                    </li>
                    <li>
                        <span>Accepted by customers</span>
                        <strong>{{ $statistics['accepted'] }}</strong>
                    </li>
                    <li>
                        <span>Completed deliveries</span>
                        <strong>{{ $statistics['completed'] }}</strong>
                    </li>
                    <li>
                        <span>Total requests handled</span>
                        <strong>{{ $statistics['total'] }}</strong>
                    </li>
                </ul>
            </div>

        </div>
    </div>

@endsection

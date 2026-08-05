@extends('layouts.admin')

@section('title', 'Cereals Management')
@section('page_title', 'Cereals Management')

@section('content')
<div class="container-fluid">
    <div class="d-flex flex-wrap justify-content-between align-items-center gap-3 mb-4">
        <div>
            <p class="text-success fw-semibold mb-1">
                Product Catalogue
            </p>

            <h1 class="h3 fw-bold mb-1">
                Cereals Management
            </h1>

            <p class="text-muted mb-0">
                Add, update, hide, or remove cereals displayed publicly.
            </p>
        </div>

        <a
            href="{{ route('admin.cereals.create') }}"
            class="btn btn-success"
        >
            Add New Cereal
        </a>
    </div>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="card border-0 shadow-sm">
        <div class="card-header bg-white py-3">
            <h2 class="h5 fw-bold mb-0">
                Listed Cereals
            </h2>
        </div>

        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead class="table-light">
                    <tr>
                        <th scope="col">Cereal</th>
                        <th scope="col">Price</th>
                        <th scope="col">Unit</th>
                        <th scope="col">Location</th>
                        <th scope="col">Status</th>
                        <th scope="col">Updated</th>
                        <th scope="col" class="text-end">Actions</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse ($cereals as $cereal)
                        <tr>
                            <td>
                                <div class="d-flex align-items-center gap-3">
                                    @if ($cereal->image_url)
                                        <img
                                            src="{{ $cereal->image_url }}"
                                            alt="{{ $cereal->name }}"
                                            width="56"
                                            height="56"
                                            class="rounded object-fit-cover"
                                            loading="lazy"
                                        >
                                    @else
                                        <div
                                            class="rounded bg-success-subtle text-success
                                                   d-inline-flex align-items-center justify-content-center"
                                            style="width: 56px; height: 56px;"
                                            aria-hidden="true"
                                        >
                                            🌾
                                        </div>
                                    @endif

                                    <div>
                                        <div class="fw-semibold">
                                            {{ $cereal->name }}
                                        </div>

                                        @if ($cereal->description)
                                            <small class="text-muted">
                                                {{ \Illuminate\Support\Str::limit($cereal->description, 70) }}
                                            </small>
                                        @endif
                                    </div>
                                </div>
                            </td>

                            <td>
                                @if ($cereal->price !== null)
                                    TZS {{ number_format((float) $cereal->price, 2) }}
                                @else
                                    <span class="text-muted">
                                        Contact for price
                                    </span>
                                @endif
                            </td>

                            <td>
                                {{ $cereal->unit ?: '—' }}
                            </td>

                            <td>
                                {{ $cereal->location ?: '—' }}
                            </td>

                            <td>
                                @php
                                    $statusClass = match ($cereal->status) {
                                        'Available' => 'text-bg-success',
                                        'Available on Request' => 'text-bg-info',
                                        'Temporarily Unavailable' => 'text-bg-warning',
                                        'Inactive' => 'text-bg-secondary',
                                        default => 'text-bg-secondary',
                                    };
                                @endphp

                                <span class="badge {{ $statusClass }}">
                                    {{ $cereal->status }}
                                </span>
                            </td>

                            <td>
                                {{ $cereal->updated_at->format('d M Y') }}
                            </td>

                            <td class="text-end">
                                <div class="d-inline-flex flex-wrap gap-2">
                                    <a
                                        href="{{ route('admin.cereals.edit', $cereal) }}"
                                        class="btn btn-sm btn-outline-success"
                                    >
                                        Edit
                                    </a>

                                    <form
                                        method="POST"
                                        action="{{ route('admin.cereals.destroy', $cereal) }}"
                                        onsubmit="return confirm('Delete this cereal permanently?')"
                                    >
                                        @csrf
                                        @method('DELETE')

                                        <button
                                            type="submit"
                                            class="btn btn-sm btn-outline-danger"
                                        >
                                            Delete
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="text-center py-5">
                                <div class="fs-1 mb-3" aria-hidden="true">
                                    🌾
                                </div>

                                <h3 class="h5 fw-bold">
                                    No cereals listed
                                </h3>

                                <p class="text-muted">
                                    Add the first cereal to display it on the public website.
                                </p>

                                <a
                                    href="{{ route('admin.cereals.create') }}"
                                    class="btn btn-success"
                                >
                                    Add New Cereal
                                </a>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        @if ($cereals->hasPages())
            <div class="card-footer bg-white py-3">
                {{ $cereals->links() }}
            </div>
        @endif
    </div>
</div>
@endsection

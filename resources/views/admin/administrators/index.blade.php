@extends('layouts.admin')

@section('title', 'Administrators')
@section('page_title', 'Administrators')

@section('content')

@if ($errors->any())
    <div class="alert alert-danger">
        {{ $errors->first() }}
    </div>
@endif

@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

<div class="container-fluid">

    <div class="mb-4">
        <p class="text-success fw-semibold mb-1">
            Access Management
        </p>

        <h1 class="h3 fw-bold mb-1">
            Administrators
        </h1>

        <p class="text-muted mb-0">
            View administrator accounts with dashboard access.
        </p>
    </div>

    <div class="card border-0 shadow-sm">

        <div class="card-header bg-white py-3">
            <h2 class="h5 fw-bold mb-0">
                Administrator Accounts
            </h2>
        </div>

        <div class="card-body p-4">

            <div class="d-flex flex-wrap justify-content-between align-items-center gap-3 mb-4">
                <p class="text-muted mb-0">
                    Manage administrator accounts with dashboard access.
                </p>

                <a
                    href="{{ route('admin.administrators.create') }}"
                    class="btn btn-outline-success"
                >
                    Create Administrator
                </a>
            </div>

            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">

                <thead class="table-light">
                    <tr>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Role</th>
                        <th scope="col">Created</th>
                        <th scope="col">Action</th>
                        <th scope="col">Delete</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse ($administrators as $administrator)
                        <tr>
                            <td class="fw-semibold">
                                {{ $administrator->name }}
                            </td>

                            <td>
                                {{ $administrator->email }}
                            </td>

                            <td>
    @if ($administrator->role === 'super_admin')
        <span class="badge text-bg-dark">
            Super Administrator
        </span>
    @else
        <span class="badge text-bg-success">
            Administrator
        </span>
    @endif
</td>

                            <td>
                                {{ $administrator->created_at->format('d M Y') }}
                            </td>
                            <td>
                                <a href="{{ route('admin.administrators.edit', $administrator) }}" class="btn btn-sm btn-outline-primary">
                                    Edit
                                </a>
</td>
<td>
    <div class="d-flex flex-wrap gap-2">
        @if (auth()->id() !== $administrator->id)
            <form
                method="POST"
                action="{{ route('admin.administrators.destroy', $administrator) }}"
                onsubmit="return confirm('Are you sure you want to delete this administrator?')"
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
        @else
            <span class="badge text-bg-secondary">
                Current Account
            </span>
        @endif

    </div>
</td>
                        
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center py-5">
                                No administrator accounts found.
                            </td>


                        </tr>
                    @endforelse
                </tbody>

            </table>
        </div>

        @if ($administrators->hasPages())
            <div class="card-footer bg-white">
                {{ $administrators->links() }}
            </div>
        @endif

    </div>
</div>
@endsection
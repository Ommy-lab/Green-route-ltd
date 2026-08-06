@extends('layouts.admin')

@section('title', 'Edit Administrator')
@section('page_title', 'Edit Administrator')

@section('content')
<div class="container-fluid">

    <div
        class="d-flex flex-wrap justify-content-between
            align-items-center gap-3 mb-4"
    >
        <div>
            <p class="text-success fw-semibold mb-1">
                Access Management
            </p>

            <h1 class="h3 fw-bold mb-1">
                Edit Administrator
            </h1>

            <p class="text-muted mb-0">
                Update administrator account information.
            </p>
        </div>

        <a
            href="{{ route('admin.administrators.index') }}"
            class="btn btn-outline-secondary"
        >
            Back to Administrators
        </a>
    </div>

    <div class="row justify-content-center">
        <div class="col-lg-8">

            <div class="card border-0 shadow-sm">
                <div class="card-body p-4">

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <h6 class="fw-bold">
                                Please correct the following:
                            </h6>

                            <ul class="mb-0">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form
                        method="POST"
                        action="{{ route(
                            'admin.administrators.update',
                            $administrator
                        ) }}"
                    >
                        @csrf
                        @method('PUT')

                        <div class="mb-3">
                            <label
                                for="name"
                                class="form-label fw-semibold"
                            >
                                Administrator Name
                            </label>

                            <input
                                type="text"
                                id="name"
                                name="name"
                                class="form-control"
                                value="{{ old(
                                    'name',
                                    $administrator->name
                                ) }}"
                                required
                            >
                        </div>

                        <div class="mb-3">
                            <label
                                for="email"
                                class="form-label fw-semibold"
                            >
                                Email Address
                            </label>

                            <input
                                type="email"
                                id="email"
                                name="email"
                                class="form-control"
                                value="{{ old(
                                    'email',
                                    $administrator->email
                                ) }}"
                                required
                            >
                        </div>

                        <hr class="my-4">

                        <h2 class="h5 fw-bold">
                            Change Password
                        </h2>

                        <p class="text-muted">
                            Leave these fields empty to keep the current password.
                        </p>

                        <div class="mb-3">
                            <label
                                for="password"
                                class="form-label fw-semibold"
                            >
                                New Password
                            </label>

                            <input
                                type="password"
                                id="password"
                                name="password"
                                class="form-control"
                                minlength="8"
                                autocomplete="new-password"
                            >
                        </div>

                        <div class="mb-4">
                            <label
                                for="password_confirmation"
                                class="form-label fw-semibold"
                            >
                                Confirm New Password
                            </label>

                            <input
                                type="password"
                                id="password_confirmation"
                                name="password_confirmation"
                                class="form-control"
                                minlength="8"
                                autocomplete="new-password"
                            >
                        </div>

                        <button
                            type="submit"
                            class="btn btn-success"
                        >
                            Update Administrator
                        </button>

                    </form>

                </div>
            </div>

        </div>
    </div>
</div>
@endsection
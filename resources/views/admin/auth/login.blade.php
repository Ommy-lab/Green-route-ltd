@extends('layouts.app')

@section('title', 'Administrator Login')

@section('content')
<section class="py-5 bg-light min-vh-100">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-7 col-lg-5">

                <div class="card border-0 shadow-sm">
                    <div class="card-body p-4 p-lg-5">

                        <div class="text-center mb-4">
                            <h1 class="h3 fw-bold">Administrator Login</h1>

                            <p class="text-muted mb-0">
                                Sign in to manage customer requests.
                            </p>
                        </div>

                        @if ($errors->any())
                            <div class="alert alert-danger">
                                {{ $errors->first() }}
                            </div>
                        @endif

                        <form
                            method="POST"
                            action="{{ route('admin.login.submit') }}"
                        >
                            @csrf

                            <div class="mb-3">
                                <label for="email" class="form-label">
                                    Email Address
                                </label>

                                <input
                                    type="email"
                                    class="form-control"
                                    id="email"
                                    name="email"
                                    value="{{ old('email') }}"
                                    required
                                    autofocus
                                >
                            </div>

                            <div class="mb-3">
                                <label for="password" class="form-label">
                                    Password
                                </label>

                                <input
                                    type="password"
                                    class="form-control"
                                    id="password"
                                    name="password"
                                    required
                                >
                            </div>

                            <div class="form-check mb-4">
                                <input
                                    class="form-check-input"
                                    type="checkbox"
                                    id="remember"
                                    name="remember"
                                >

                                <label
                                    class="form-check-label"
                                    for="remember"
                                >
                                    Remember me
                                </label>
                            </div>

                            <button
                                type="submit"
                                class="btn btn-success w-100"
                            >
                                Login
                            </button>
                        </form>

                    </div>
                </div>

            </div>
        </div>
    </div>
</section>
@endsection
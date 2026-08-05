@extends('layouts.admin')

@section('title', 'Create Administrator')
@section('page_title', 'Create Administrator')

@section('content')

<div class="container-fluid">

    <div class="mb-4">
        <h1 class="h3 fw-bold">
            Create Administrator
        </h1>

        <p class="text-muted">
            Add another administrator to the system.
        </p>
    </div>

    <div class="card border-0 shadow-sm">

        <div class="card-body p-4">

            @if ($errors->any())

                <div class="alert alert-danger">

                    <ul class="mb-0">

                        @foreach($errors->all() as $error)

                            <li>{{ $error }}</li>

                        @endforeach

                    </ul>

                </div>

            @endif

            <form
                method="POST"
                action="{{ route('admin.administrators.store') }}"
            >

                @csrf

                <div class="mb-3">

                    <label class="form-label">
                        Name
                    </label>

                    <input
                        type="text"
                        name="name"
                        class="form-control"
                        value="{{ old('name') }}"
                        required
                    >

                </div>

                <div class="mb-3">

                    <label class="form-label">
                        Email
                    </label>

                    <input
                        type="email"
                        name="email"
                        class="form-control"
                        value="{{ old('email') }}"
                        required
                    >

                </div>

                <div class="mb-3">

                    <label class="form-label">
                        Password
                    </label>

                    <input
                        type="password"
                        name="password"
                        class="form-control"
                        required
                    >

                </div>

                <div class="mb-4">

                    <label class="form-label">
                        Confirm Password
                    </label>

                    <input
                        type="password"
                        name="password_confirmation"
                        class="form-control"
                        required
                    >

                </div>

                <button
                    class="btn btn-success"
                    type="submit"
                >
                    Create Administrator
                </button>

            </form>

        </div>

    </div>

</div>

@endsection
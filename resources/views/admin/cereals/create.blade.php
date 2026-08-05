@extends('layouts.admin')

@section('title', 'Add Cereal')
@section('page_title', 'Add Cereal')

@section('content')
<div class="container-fluid">
    <div class="d-flex flex-wrap justify-content-between align-items-center gap-3 mb-4">
        <div>
            <p class="text-success fw-semibold mb-1">
                Cereals Management
            </p>

            <h1 class="h3 fw-bold mb-1">
                Add New Cereal
            </h1>

            <p class="text-muted mb-0">
                Add a cereal to the public catalogue.
            </p>
        </div>

        <a
            href="{{ route('admin.cereals.index') }}"
            class="btn btn-outline-secondary"
        >
            Back to Cereals
        </a>
    </div>

    <div class="card border-0 shadow-sm">
        <div class="card-body p-4">
            <form
                method="POST"
                action="{{ route('admin.cereals.store') }}"
            >
                @csrf

                @include('admin.cereals.form')
            </form>
        </div>
    </div>
</div>
@endsection

@extends('layouts.admin')

@section('title', 'Settings')
@section('page_title', 'Settings')

@section('content')
<div class="container-fluid">

    <div class="mb-4">
        <p class="text-success fw-semibold mb-1">
            System Configuration
        </p>

        <h1 class="h3 fw-bold mb-1">
            Settings
        </h1>

        <p class="text-muted mb-0">
            General business and system settings will be managed here.
        </p>
    </div>

    <div class="card border-0 shadow-sm">
        <div class="card-body p-4">

            <div class="alert alert-info mb-0">
                The settings page is connected successfully.
                Editable company information can be added after deployment.
            </div>

        </div>
    </div>
</div>
@endsection
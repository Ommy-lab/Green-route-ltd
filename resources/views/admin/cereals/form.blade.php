@php
    $editing = isset($cereal);
@endphp

@if ($errors->any())
    <div class="alert alert-danger">
        <h6 class="fw-bold">Please correct the following:</h6>

        <ul class="mb-0">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<div class="row g-3">
    <div class="col-md-6">
        <label for="name" class="form-label fw-semibold">
            Cereal Name
        </label>

        <input
            type="text"
            id="name"
            name="name"
            class="form-control"
            value="{{ old('name', $cereal->name ?? '') }}"
            maxlength="100"
            required
        >
    </div>

    <div class="col-md-6">
        <label for="status" class="form-label fw-semibold">
            Availability Status
        </label>

        <select
            id="status"
            name="status"
            class="form-select"
            required
        >
            @php
                $selectedStatus = old(
                    'status',
                    $cereal->status ?? 'Available on Request'
                );
            @endphp

            @foreach ([
                'Available',
                'Available on Request',
                'Temporarily Unavailable',
                'Inactive',
            ] as $status)
                <option
                    value="{{ $status }}"
                    @selected($selectedStatus === $status)
                >
                    {{ $status }}
                </option>
            @endforeach
        </select>
    </div>

    <div class="col-md-6">
        <label for="price" class="form-label fw-semibold">
            Price
            <span class="text-muted fw-normal">(optional)</span>
        </label>

        <div class="input-group">
            <span class="input-group-text">TZS</span>

            <input
                type="number"
                id="price"
                name="price"
                class="form-control"
                value="{{ old('price', $cereal->price ?? '') }}"
                min="0"
                step="0.01"
                placeholder="Leave blank for Contact for price"
            >
        </div>
    </div>

    <div class="col-md-6">
        <label for="unit" class="form-label fw-semibold">
            Selling Unit
            <span class="text-muted fw-normal">(optional)</span>
        </label>

        <input
            type="text"
            id="unit"
            name="unit"
            class="form-control"
            value="{{ old('unit', $cereal->unit ?? '') }}"
            maxlength="30"
            placeholder="Example: Bag, Kilogram, Tonne"
        >
    </div>

    <div class="col-md-6">
        <label for="location" class="form-label fw-semibold">
            Location
            <span class="text-muted fw-normal">(optional)</span>
        </label>

        <input
            type="text"
            id="location"
            name="location"
            class="form-control"
            value="{{ old('location', $cereal->location ?? '') }}"
            maxlength="255"
            placeholder="Example: Morogoro"
        >
    </div>

    <div class="col-md-6">
        <label for="image_url" class="form-label fw-semibold">
            Image URL
            <span class="text-muted fw-normal">(optional)</span>
        </label>

        <input
            type="url"
            id="image_url"
            name="image_url"
            class="form-control"
            value="{{ old('image_url', $cereal->image_url ?? '') }}"
            maxlength="2048"
            placeholder="https://example.com/image.jpg"
        >
    </div>

    <div class="col-12">
        <label for="description" class="form-label fw-semibold">
            Description
            <span class="text-muted fw-normal">(optional)</span>
        </label>

        <textarea
            id="description"
            name="description"
            class="form-control"
            rows="5"
            maxlength="2000"
            placeholder="Describe the cereal, quality, packaging, or other useful information."
        >{{ old('description', $cereal->description ?? '') }}</textarea>
    </div>
</div>

<div class="d-flex flex-wrap gap-2 mt-4">
    <button
        type="submit"
        class="btn btn-success"
    >
        {{ $editing ? 'Update Cereal' : 'Add Cereal' }}
    </button>

    <a
        href="{{ route('admin.cereals.index') }}"
        class="btn btn-outline-secondary"
    >
        Cancel
    </a>
</div>

{{--
    Usage:
    @include('admin.components.empty-state', [
        'title' => 'No requests found',
        'message' => 'Customer requests will appear here once submitted.',
    ])
--}}

<div class="admin-empty-state">
    <div class="admin-empty-icon" aria-hidden="true">
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path><path d="M14 2v6h6"></path><line x1="9" y1="14" x2="15" y2="14"></line><line x1="9" y1="17" x2="13" y2="17"></line></svg>
    </div>
    <h3>{{ $title ?? 'No requests found' }}</h3>
    <p>{{ $message ?? 'Customer requests will appear here once submitted.' }}</p>
    <a href="{{ route('home') }}" class="btn btn-outline-green" target="_blank" rel="noopener">
        View Public Website
    </a>
</div>

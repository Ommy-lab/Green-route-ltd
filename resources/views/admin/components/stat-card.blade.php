{{--
    Usage:
    @include('admin.components.stat-card', [
        'label' => 'Total Requests',
        'value' => $statistics['total'],
        'description' => 'All requests received',
        'variant' => 'primary', // primary | warning | success | danger | dark-green
        'icon' => 'list',       // list | clock | check | x | check-double
    ])
--}}
@php
    $icons = [
        'list' => '<path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path><path d="M14 2v6h6"></path>',
        'clock' => '<circle cx="12" cy="12" r="10"></circle><path d="M12 6v6l4 2"></path>',
        'check' => '<path d="M9 11l3 3L22 4"></path><path d="M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11"></path>',
        'x' => '<circle cx="12" cy="12" r="10"></circle><line x1="15" y1="9" x2="9" y2="15"></line><line x1="9" y1="9" x2="15" y2="15"></line>',
        'check-double' => '<path d="M18 6 7 17l-5-5"></path><path d="M22 10 12 20l-2-2"></path>',
    ];
    $iconPath = $icons[$icon ?? 'list'] ?? $icons['list'];
    $variantClass = 'admin-stat-card--' . ($variant ?? 'primary');
@endphp

<div class="admin-stat-card {{ $variantClass }}">
    <div class="admin-stat-icon">
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">{!! $iconPath !!}</svg>
    </div>
    <div class="admin-stat-body">
        <p class="admin-stat-label">{{ $label }}</p>
        <p class="admin-stat-value">{{ $value }}</p>
        @if (!empty($description))
            <p class="admin-stat-desc">{{ $description }}</p>
        @endif
    </div>
</div>

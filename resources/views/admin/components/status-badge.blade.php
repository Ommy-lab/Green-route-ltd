{{--
    Usage:
    @include('admin.components.status-badge', ['status' => $request->status])
--}}
@php
    $statusConfig = match ($status) {
        'Pending Price' => ['class' => 'admin-badge--warning', 'label' => 'Pending Price'],
        'Price Sent'    => ['class' => 'admin-badge--info',    'label' => 'Price Sent'],
        'Accepted'      => ['class' => 'admin-badge--success', 'label' => 'Accepted'],
        'Rejected'      => ['class' => 'admin-badge--danger',  'label' => 'Rejected'],
        'In Progress'   => ['class' => 'admin-badge--primary', 'label' => 'In Progress'],
        'Completed'     => ['class' => 'admin-badge--dark-green', 'label' => 'Completed'],
        default         => ['class' => 'admin-badge--muted', 'label' => $status],
    };
@endphp

<span class="admin-badge {{ $statusConfig['class'] }}">
    {{ $statusConfig['label'] }}
</span>

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Http\Controllers\Admin\RequestStatusController;

class Quotation extends Model
{
    protected $fillable = [
        'service_request_id',
        'cereal_cost',
        'transport_cost',
        'loading_cost',
        'other_cost',
        'discount',
        'total_price',
        'estimated_delivery',
        'notes',
        'valid_until',
        'customer_decision',
        'rejection_reason',
    ];

    protected function casts(): array
    {
        return [
            'cereal_cost' => 'decimal:2',
            'transport_cost' => 'decimal:2',
            'loading_cost' => 'decimal:2',
            'other_cost' => 'decimal:2',
            'discount' => 'decimal:2',
            'total_price' => 'decimal:2',
            'valid_until' => 'date',
        ];
    }

    public function serviceRequest(): BelongsTo
    {
        return $this->belongsTo(ServiceRequest::class);
    }
}
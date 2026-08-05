<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class ServiceRequest extends Model
{
    protected $fillable = [
        'request_number',
        'tracking_token',
        'customer_name',
        'phone',
        'email',
        'service_type',
        'cereal_type',
        'quantity',
        'unit',
        'pickup_location',
        'delivery_location',
        'preferred_date',
        'message',
        'status'
    ];
protected function casts(): array
    {
        return [
            'quantity' => 'decimal:2',
            'preferred_date' => 'date',
        ];
    }

    public function quotation(): HasOne
    {
        return $this->hasOne(Quotation::class);
    }
}
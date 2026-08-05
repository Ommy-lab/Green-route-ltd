<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cereal extends Model
{
    protected $fillable = [
        'name',
        'description',
        'price',
        'unit',
        'location',
        'image_url',
        'status',
    ];

    protected function casts(): array
    {
        return [
            'price' => 'decimal:2',
        ];
    }
}
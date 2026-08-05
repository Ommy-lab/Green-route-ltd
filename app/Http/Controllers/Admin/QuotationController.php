<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ServiceRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class QuotationController extends Controller
{
    public function store(
        Request $request,
        ServiceRequest $serviceRequest
    ): RedirectResponse {
        $validated = $request->validate([
            'cereal_cost' => ['nullable', 'numeric', 'min:0'],
            'transport_cost' => ['nullable', 'numeric', 'min:0'],
            'loading_cost' => ['nullable', 'numeric', 'min:0'],
            'other_cost' => ['nullable', 'numeric', 'min:0'],
            'discount' => ['nullable', 'numeric', 'min:0'],
            'estimated_delivery' => ['nullable', 'string', 'max:100'],
            'notes' => ['nullable', 'string', 'max:2000'],
            'valid_until' => ['nullable', 'date', 'after_or_equal:today'],
        ]);

        $cerealCost = (float) ($validated['cereal_cost'] ?? 0);
        $transportCost = (float) ($validated['transport_cost'] ?? 0);
        $loadingCost = (float) ($validated['loading_cost'] ?? 0);
        $otherCost = (float) ($validated['other_cost'] ?? 0);
        $discount = (float) ($validated['discount'] ?? 0);

        $subtotal =
            $cerealCost +
            $transportCost +
            $loadingCost +
            $otherCost;

        $totalPrice = max($subtotal - $discount, 0);

        $serviceRequest->quotation()->updateOrCreate(
            [
                'service_request_id' => $serviceRequest->id,
            ],
            [
                'cereal_cost' => $cerealCost,
                'transport_cost' => $transportCost,
                'loading_cost' => $loadingCost,
                'other_cost' => $otherCost,
                'discount' => $discount,
                'total_price' => $totalPrice,
                'estimated_delivery' => $validated['estimated_delivery'] ?? null,
                'notes' => $validated['notes'] ?? null,
                'valid_until' => $validated['valid_until'] ?? null,
                'customer_decision' => 'Pending',
                'rejection_reason' => null,
            ]
        );

        $serviceRequest->update([
            'status' => 'Price Sent',
        ]);

        return back()->with(
            'success',
            'Quotation sent successfully.'
        );
    }
}
<?php

namespace App\Http\Controllers;

use App\Models\ServiceRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\View\View;

class ServiceRequestController extends Controller
{
    public function create(): View
    {
        return view('customer.request-form');
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'customer_name' => ['required', 'string', 'max:100'],
            'phone' => ['required', 'string', 'max:30'],
            'email' => ['nullable', 'email', 'max:100'],

            'service_type' => [
                'required',
                'in:transport_own_cereals,buy_with_transport,buy_without_transport',
            ],

            'cereal_type' => ['required', 'string', 'max:100'],
            'quantity' => ['required', 'numeric', 'min:0.01'],
            'unit' => ['required', 'in:Bags,Kilograms,Tonnes'],

            'pickup_location' => [
                'nullable',
                'required_if:service_type,transport_own_cereals',
                'string',
                'max:255',
            ],

            'delivery_location' => [
                'nullable',
                'required_if:service_type,transport_own_cereals,buy_with_transport',
                'string',
                'max:255',
            ],

            'preferred_date' => ['nullable', 'date', 'after_or_equal:today'],
            'message' => ['nullable', 'string', 'max:2000'],
        ]);

        $serviceRequest = ServiceRequest::create([
            ...$validated,
            'request_number' => $this->generateRequestNumber(),
            'tracking_token' => Str::random(64),
            'status' => 'Pending Price',
        ]);

return redirect()
    ->route('requests.create')
    ->with([
        'success' => 'Your request has been submitted successfully.',
        'request_number' => $serviceRequest->request_number,
        'request_status' => $serviceRequest->status,
        'tracking_url' => route(
            'requests.track',
            $serviceRequest->tracking_token
        ),
    ]);
}

public function showTrackForm(): View
{
    return view('customer.track-form');
}

public function searchRequest(Request $request): RedirectResponse
{
    $validated = $request->validate([
        'request_number' => ['required', 'string', 'max:50'],
        'tracking_phone' => ['required', 'string', 'max:30'],
    ]);

    $serviceRequest = ServiceRequest::where(
        'request_number',
        strtoupper(trim($validated['request_number']))
    )
        ->where('phone', trim($validated['tracking_phone']))
        ->first();

    if (!$serviceRequest) {
        return back()
            ->withInput()
            ->withErrors([
                'request_number' =>
                    'No request was found using that request number and phone number.',
            ]);
    }

    return redirect()->route(
        'requests.track',
        $serviceRequest->tracking_token
    );
}

    public function track(string $token): View
    {
        $serviceRequest = ServiceRequest::where(
            'tracking_token',
            $token
        )->firstOrFail();

        // load the quotation relationship to avoid N+1 queries in the view
        $serviceRequest->load('quotation');

        return view('customer.tracking', compact('serviceRequest'));
    }

    private function generateRequestNumber(): string
    {
        $nextId = (ServiceRequest::max('id') ?? 0) + 1;

        return 'CTR-' . now()->format('Y') . '-' .
            str_pad((string) $nextId, 5, '0', STR_PAD_LEFT);
    }
}
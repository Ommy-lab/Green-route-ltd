<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ServiceRequest;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Validation\Rule;

class RequestStatusController extends Controller
{
    public function update(
        Request $request,
        ServiceRequest $serviceRequest
    ): RedirectResponse {

        $validated = $request->validate([
            'status' => [
                'required',
                Rule::in([
                    'In Progress',
                    'Completed',
                ]),
            ],
        ]);

        $serviceRequest->update([
            'status' => $validated['status'],
        ]);

        return back()->with(
            'success',
            'Request status updated successfully.'
        );
    }
}
<?php

namespace App\Http\Controllers;

use App\Models\Quotation;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class CustomerQuotationController extends Controller
{
    public function accept(
        Request $request,
        Quotation $quotation
    ): RedirectResponse {
        //prevent changing an already decided quotation
        if ($quotation->customer_decision !== 'Pending') {
            return back()->withErrors([
                'decision' =>
                    'You have already made a decision on this quotation.',
            ]);
        }

        $quotation->update([
            'customer_decision' => 'Accepted',
        ]);

        $quotation->serviceRequest->update([
            'status' => 'Accepted',
        ]);

        return back()->with(
            'success',
            'You have accepted the quotation successfully.'
        );
    }

    public function reject(
        Request $request,
        Quotation $quotation
    ): RedirectResponse {

        $request->validate([
            'rejection_reason' => ['nullable', 'string', 'max:1000'],
        ]);

        $quotation->update([
            'customer_decision' => 'Rejected',
            'rejection_reason' => $request->rejection_reason,
        ]);

        $quotation->serviceRequest->update([
            'status' => 'Rejected',
        ]);

        return back()->with(
            'success',
            'Quotation rejected successfully.'
        );
    }
}
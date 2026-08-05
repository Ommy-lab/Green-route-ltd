<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ServiceRequest;
use Illuminate\View\View;
use Illuminate\Http\Request;

class RequestController extends Controller
{
    public function show(ServiceRequest $serviceRequest): View
    {
        $serviceRequest->load('quotation');
        
        return view(
            'admin.requests.show',
            compact('serviceRequest')
        );
    }

    public function index(Request $request): View
    {
        $allowedStatuses = ['pending', 'Price sent', 'Accepted', 'In Progress', 'Completed',];

        $status = $request->query('status');
        $search = trim((string) $request->query('search'));

        $status = $request->query('status');
    $search = trim((string) $request->query('search'));

    $query = ServiceRequest::query()
        ->with('quotation')
        ->latest();

    if ($status && in_array($status, $allowedStatuses, true)) {
        $query->where('status', $status);
    }

    if ($search !== '') {
        $query->where(function ($query) use ($search) {
            $query
                ->where('request_number', 'like', "%{$search}%")
                ->orWhere('customer_name', 'like', "%{$search}%")
                ->orWhere('phone', 'like', "%{$search}%")
                ->orWhere('cereal_type', 'like', "%{$search}%");
        });
    }

    $requests = $query
        ->paginate(15)
        ->withQueryString();

    return view('admin.requests.index', compact(
        'requests',
        'status',
        'search',
        'allowedStatuses'
    ));
    }
}
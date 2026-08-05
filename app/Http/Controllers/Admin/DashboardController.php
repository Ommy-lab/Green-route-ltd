<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ServiceRequest;
use Illuminate\Http\Request;
use Illuminate\View\View;

class DashboardController extends Controller
{
    public function index(): View
    {
        $statistics = [
            'total' => ServiceRequest::count(),

            'pending' => ServiceRequest::where(
                'status',
                'Pending Price'
            )->count(),

            'accepted' => ServiceRequest::where(
                'status',
                'Accepted'
            )->count(),

            'rejected' => ServiceRequest::where(
                'status',
                'Rejected'
            )->count(),

            'completed' => ServiceRequest::where(
                'status',
                'Completed'
            )->count(),
        ];

        $requests = ServiceRequest::latest()
            ->paginate(10);

        return view(
            'admin.dashboard',
            compact('statistics', 'requests')
        );
    }
}
<?php

namespace App\Http\Controllers;

use App\Models\Cereal;
use Illuminate\View\View;

class CerealPageController extends Controller
{
    public function index(): View
    {
        $cereals = Cereal::where('status', '!=', 'Inactive')
            ->latest()
            ->get();

        return view('pages.cereals', compact('cereals'));
    }
}
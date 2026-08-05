<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Cereal;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class CerealController extends Controller
{
    public function index(): View
    {
        $cereals = Cereal::latest()->paginate(10);

        return view('admin.cereals.index', compact('cereals'));
    }

    public function create(): View
    {
        return view('admin.cereals.create');
    }

    public function store(Request $request): RedirectResponse
    {
        Cereal::create($this->validatedData($request));

        return redirect()
            ->route('admin.cereals.index')
            ->with('success', 'Cereal added successfully.');
    }

    public function edit(Cereal $cereal): View
    {
        return view('admin.cereals.edit', compact('cereal'));
    }

    public function update(
        Request $request,
        Cereal $cereal
    ): RedirectResponse {
        $cereal->update($this->validatedData($request));

        return redirect()
            ->route('admin.cereals.index')
            ->with('success', 'Cereal updated successfully.');
    }

    public function destroy(Cereal $cereal): RedirectResponse
    {
        $cereal->delete();

        return redirect()
            ->route('admin.cereals.index')
            ->with('success', 'Cereal deleted successfully.');
    }

    private function validatedData(Request $request): array
    {
        return $request->validate([
            'name' => ['required', 'string', 'max:100'],
            'description' => ['nullable', 'string', 'max:2000'],
            'price' => ['nullable', 'numeric', 'min:0'],
            'unit' => ['nullable', 'string', 'max:30'],
            'location' => ['nullable', 'string', 'max:255'],
            'image_url' => ['nullable', 'url', 'max:2048'],
            'status' => [
                'required',
                'in:Available,Available on Request,Temporarily Unavailable,Inactive',
            ],
        ]);
    }
}
<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\View\View;

class AdministratorController extends Controller
{
    public function index(): View
    {
        $administrators = User::where('is_admin', true)
            ->latest()
            ->paginate(10);

        return view(
            'admin.administrators.index',
            compact('administrators')
        );
    }

    public function create(): View
{
    return view('admin.administrators.create');
}

public function store(Request $request): RedirectResponse
{
    $validated = $request->validate([
        'name' => ['required', 'string', 'max:100'],

        'email' => [
            'required',
            'email',
            'max:255',
            'unique:' . User::class . ',email'
        ],

        'password' => [
            'required',
            'string',
            'min:8',
            'confirmed',
        ],
    ]);

    User::create([
        'name' => $validated['name'],
        'email' => $validated['email'],
        'password' => $validated['password'], // hashed automatically if your User model has the 'hashed' cast
        'is_admin' => true,
    ]);

    return redirect()
        ->route('admin.administrators.index')
        ->with(
            'success',
            'Administrator created successfully.'
        );
}

    public function edit(User $administrator): View
    {
        if (! $administrator->is_admin) {
            abort(404);
        }

        return view(
            'admin.administrators.edit',
            compact('administrator')
        );
    }

    public function update(
        Request $request,
        User $administrator
    ): RedirectResponse {
        if (! $administrator->is_admin) {
            abort(404);
        }

        $validated = $request->validate([
            'name' => [
                'required',
                'string',
                'max:100',
            ],

            'email' => [
                'required',
                'email',
                'max:255',
                Rule::unique(User::class, 'email')
                    ->ignore($administrator),
            ],

            'password' => [
                'nullable',
                'string',
                'min:8',
                'confirmed',
            ],
        ]);

        $administrator->name = $validated['name'];
        $administrator->email = $validated['email'];

        if (! empty($validated['password'])) {
            $administrator->password = $validated['password'];
        }

        $administrator->save();

        return redirect()
            ->route('admin.administrators.index')
            ->with(
                'success',
                'Administrator details updated successfully.'
            );
    }

    public function destroy(User $administrator): RedirectResponse
    {
    if (! $administrator->is_admin) {
        abort(404);
    }

    if ($administrator->is(auth()->user())) {
        return back()->withErrors([
            'administrator' => 'You cannot delete the administrator account you are currently using.',
        ]);
    }

    $adminCount = User::where('is_admin', true)->count();

    if ($adminCount <= 1) {
        return back()->withErrors([
            'administrator' => 'You cannot delete the last administrator account.',
        ]);
    }

    $administrator->delete();

    return redirect()
        ->route('admin.administrators.index')
        ->with('success', 'Administrator deleted successfully.');
    }
}
<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function create(): View
    {
        return view('users.create');
    }

    public function show(User $user):View
    {
        return view('users.show', compact('user'));
    }

    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => 'required|string|unique:users|max:50',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password)
        ]);

        auth()->login($user);

        return redirect()->route('users.show', $user)->with('success', 'User created successfully.');
    }

    public function update(Request $request, User $user): RedirectResponse
    {
        // Validate the request data
        $request->validate([
            'name' => 'required|string|max:50',
            'password' => 'nullable|string|min:6|confirmed',
        ]);


        $data = $request->only('name');
        if ($request->filled('password')) {
            $data = $request->only('name','password');
        }
        $user->update($data);

        // Redirect to the user's profile with a session flash message.
        return redirect()->route('users.show', $user)->with('success', 'User updated successfully.');
    }
}

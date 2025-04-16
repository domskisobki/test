<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    public function index()
    {
        $users = User::latest()->paginate(10);
        return view('users.index', compact('users'));
    }

    public function create()
    {
        return view('users.create');
    }

    public function store(Request $request)
    {
        $data = $this->validateUser($request);

        if ($request->hasFile('selfie')) {
            $data['selfie'] = $request->file('selfie')->store('selfie', 'public');
        }

        $data['password'] = Hash::make($data['password']);
        User::create($data);

        return redirect()->route('users.index')->with('success', 'User created successfully.');
    }

    public function show(User $user)
    {
        return view('users.show', compact('user'));
    }

    public function edit(User $user)
    {
        return view('users.edit', compact('user'));
    }

    public function update(Request $request, User $user)
    {
        $data = $this->validateUser($request, $user->id);

        if ($request->hasFile('selfie')) {
            if ($user->selfie) {
                Storage::disk('public')->delete($user->selfie);
            }
            $data['selfie'] = $request->file('selfie')->store('selfies', 'public');
        }

        if ($request->filled('password')) {
            $data['password'] = Hash::make($data['password']);
        } else {
            unset($data['password']);
        }

        $user->update($data);

        return redirect()->route('users.index')->with('success', 'User updated successfully.');
    }

    public function destroy(User $user)
    {
        if ($user->selfie) {
            Storage::disk('public')->delete($user->selfie);
        }

        $user->delete();
        return redirect()->route('users.index')->with('success', 'User deleted successfully.');
    }

    protected function validateUser(Request $request, $userId = null)
    {
        $uniqueEmail = Rule::unique('users', 'email')->ignore($userId);

        return $request->validate([
            'name' => 'required|string|max:255',
            'surname' => 'required|string|max:255',
            'email' => ['required', 'email', $uniqueEmail],
            'phone' => 'required|string|max:20',
            'country' => 'required|string',
            'gender' => ['required', Rule::in(['male', 'female', 'other'])],
            'password' => $userId ? 'nullable|min:6|confirmed' : 'required|min:6|confirmed',
            'selfie' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'introduction' => 'nullable|string|max:500',
        ]);
    }
}

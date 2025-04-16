@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto py-6">
    <div class="flex justify-between mb-4">
        <h1 class="text-2xl font-bold">Users</h1>
        <a href="{{ route('users.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Add User</a>
    </div>

    @if(session('success'))
        <div class="mb-4 text-green-600">{{ session('success') }}</div>
    @endif

    <table class="w-full table-auto border">
        <thead>
            <tr class="bg-gray-100 text-left">
                <th class="p-2">Name</th>
                <th class="p-2">Email</th>
                <th class="p-2">Phone</th>
                <th class="p-2">Country</th>
                <th class="p-2">Introduction</th>
                <th class="p-2">Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($users as $user)
                <tr class="border-t">
                    <td class="p-2">{{ $user->name }} {{ $user->surname }}</td>
                    <td class="p-2">{{ $user->email }}</td>
                    <td class="p-2">{{ $user->phone }}</td>
                    <td class="p-2">{{ $user->country }}</td>
                    <td class="p-2">{{ $user->introduction }}</td>
                    <td class="p-2 space-x-2">
                        <a href="{{ route('users.show', $user) }}" class="text-blue-600 hover:underline">View</a>
                        <a href="{{ route('users.edit', $user) }}" class="text-yellow-600 hover:underline">Edit</a>
                        <form action="{{ route('users.destroy', $user) }}" method="POST" class="inline" onsubmit="return confirm('Delete this user?')">
                            @csrf
                            @method('DELETE')
                            <button class="text-red-600 hover:underline">Delete</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr><td class="p-2" colspan="5">No users found.</td></tr>
            @endforelse
        </tbody>
    </table>

    <div class="mt-4">{{ $users->links() }}</div>
</div>
@endsection

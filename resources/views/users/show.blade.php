@extends('layouts.app')

@section('content')
<div class="max-w-xl mx-auto py-6">
    <h1 class="text-2xl font-bold mb-4">User Details</h1>

    @if($user->profile_picture)
        <img src="{{ asset('storage/' . $user->profile_picture) }}" alt="Profile Picture" class="w-32 h-32 object-cover rounded-full mb-4">
    @endif

    <ul class="space-y-2">
        <li><strong>Name:</strong> {{ $user->name }} {{ $user->surname }}</li>
        <li><strong>Email:</strong> {{ $user->email }}</li>
        <li><strong>Phone:</strong> {{ $user->phone }}</li>
        <li><strong>Country:</strong> {{ $user->country }}</li>
        <li><strong>Gender:</strong> {{ ucfirst($user->gender) }}</li>
        <li><strong>Introduction:</strong> {{ $user->introduction }}</li>
    </ul>

    <div class="mt-4 space-x-2">
        <a href="{{ route('users.edit', $user) }}" class="text-yellow-600 hover:underline">Edit</a>
        <a href="{{ route('users.index') }}" class="text-blue-600 hover:underline">Back</a>
    </div>
</div>
@endsection

@extends('layouts.app')

@section('content')
<div class="max-w-xl mx-auto py-6">
    <h1 class="text-2xl font-bold mb-4">Add New User</h1>

    <form action="{{ route('users.store') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
        @csrf

        @include('users.partials.form', ['submit' => 'Create'])

    </form>
</div>
@endsection

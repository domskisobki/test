@php
    $genders = ['male', 'female', 'other'];
@endphp

<div>
    <label>Name</label>
    <input type="text" name="name" value="{{ old('name', $user->name ?? '') }}" class="w-full border p-2 rounded">
    @error('name') <small class="text-red-500">{{ $message }}</small> @enderror
</div>

<div>
    <label>Surname</label>
    <input type="text" name="surname" value="{{ old('surname', $user->surname ?? '') }}" class="w-full border p-2 rounded">
    @error('surname') <small class="text-red-500">{{ $message }}</small> @enderror
</div>

<div>
    <label>Email</label>
    <input type="email" name="email" value="{{ old('email', $user->email ?? '') }}" class="w-full border p-2 rounded">
    @error('email') <small class="text-red-500">{{ $message }}</small> @enderror
</div>

<div>
    <label>Phone</label>
    <input type="text" name="phone" value="{{ old('phone', $user->phone ?? '') }}" class="w-full border p-2 rounded">
    @error('phone') <small class="text-red-500">{{ $message }}</small> @enderror
</div>

<div>
    <label>Country</label>
    <select name="country" class="w-full border p-2 rounded">
        @foreach(config('countries') as $country)
            <option value="{{ $country }}" {{ old('country', $user->country ?? '') === $country ? 'selected' : '' }}>
                {{ $country }}
            </option>
        @endforeach
    </select>
    @error('country') <small class="text-red-500">{{ $message }}</small> @enderror
</div>

<div>
    <label>Gender</label>
    <select name="gender" class="w-full border p-2 rounded">
        @foreach($genders as $gender)
            <option value="{{ $gender }}" {{ old('gender', $user->gender ?? '') === $gender ? 'selected' : '' }}>
                {{ ucfirst($gender) }}
            </option>
        @endforeach
    </select>
    @error('gender') <small class="text-red-500">{{ $message }}</small> @enderror
</div>

<div>
    <label>Password</label>
    <input type="password" name="password" class="w-full border p-2 rounded">
    @error('password') <small class="text-red-500">{{ $message }}</small> @enderror
</div>

<div>
    <label>Repeat Password</label>
    <input type="password" name="password_confirmation" class="w-full border p-2 rounded">
</div>

<div>
    <label>Profile Picture</label>
    <input type="file" name="selfie" accept="image/*" class="w-full border p-2 rounded">
    @error('selfie') <small class="text-red-500">{{ $message }}</small> @enderror
</div>

<div>
    <label>Introduction</label>
    <textarea name="introduction" rows="4" class="w-full border p-2 rounded">{{ old('introduction', $user->introduction ?? '') }}</textarea>
    @error('introduction') <small class="text-red-500">{{ $message }}</small> @enderror
</div>

<div>
    <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">
        {{ $submit }}
    </button>
</div>

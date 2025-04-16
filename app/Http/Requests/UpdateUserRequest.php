<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'surname' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $this->user->id,
            'phone' => 'required|string|max:20',
            'country' => 'required|string|in:' . implode(',', config('countries')),
            'gender' => 'required|in:male,female,other',
            'password' => 'required|confirmed|min:6',
            'profile_picture' => 'nullable|image|max:2048',
            'introduction' => 'nullable|string',
        ];
    }
}

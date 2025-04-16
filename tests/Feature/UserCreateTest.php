<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class UserCreateTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_creates_a_user()
    {
        Storage::fake('avatars');

        $selfie = UploadedFile::fake()->image('avatars.jpg');

        Storage::disk('avatars')->putFile('/', $selfie);

        $data = [
            'name' => 'John',
            'surname' => 'Doe',
            'email' => 'john.doe@example.com',
            'phone' => '1234567890',
            'country' => 'USA',
            'gender' => 'male',
            'password' => 'password123',
            'password_confirmation' => 'password123',
            'introduction' => 'sample intro',
        ];

        $response = $this->post(route('users.store'), $data);

        $response->assertRedirect(route('users.index'));
        $this->assertDatabaseHas('users', [
            'email' => 'john.doe@example.com',
        ]);
    }
}

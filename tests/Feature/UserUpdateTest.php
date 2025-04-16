<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class UserUpdateTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_updates_a_user()
    {
        $user = User::factory()->create();

        $data = [
            'name' => 'Updated Name',
            'surname' => 'Updated Surname',
            'email' => 'updated.email@example.com',
            'phone' => '0987654321',
            'country' => 'Canada',
            'gender' => 'female',
            'password' => 'newpassword123',
            'password_confirmation' => 'newpassword123',
        ];

        $response = $this->put(route('users.update', $user->id), $data);

        $response->assertRedirect(route('users.index'));
        $this->assertDatabaseHas('users', [
            'email' => 'updated.email@example.com',
            'name' => 'Updated Name',
        ]);
    }
}

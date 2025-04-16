<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class UserIndexTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_shows_a_list_of_users()
    {
        User::factory()->count(5)->create();

        $response = $this->get(route('users.index'));

        $response->assertStatus(200);
        $response->assertSee('Users');
    }
}

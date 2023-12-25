<?php

namespace Tests\Feature;

use App\Models\User;
use Database\Factories\UserFactory;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ProfileControllerTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function profile_page_loads_correctly()
    {
        $user = UserFactory::new()->create();
        $response = $this->actingAs($user)->get('/profile');

        $response->assertStatus(200);
        $response->assertViewIs('profile');
        $response->assertSee($user->name);
    }
}

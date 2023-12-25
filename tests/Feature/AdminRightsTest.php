<?php

namespace Tests\Feature;

use App\Models\User;
use Database\Factories\UserFactory;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AdminRightsTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function only_admin_can_access_admin_panel()
    {
        $user = UserFactory::new()->create(['is_admin' => false]);
        $this->actingAs($user);

        $response = $this->get('/admin/panel');
        $response->assertStatus(403); // or assertRedirect if you're redirecting non-admins

        $admin = UserFactory::new()->create(['is_admin' => true]);
        $this->actingAs($admin);

        $response = $this->get('/admin/panel');
        $response->assertStatus(200);
    }
}

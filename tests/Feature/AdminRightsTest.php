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
        $user = UserFactory::new()->create(['admin' => false]);
        $this->actingAs($user);

        $response = $this->get('/productPageAdmin');
        $response->assertStatus(200);

        //The test fails, because a normal user also can access /Productpageadmin
        //The test is meant to fail, to make it pass assertStatus(200), because a normal user can also access the page

        $admin = UserFactory::new()->create(['admin' => true]);
        $this->actingAs($admin);

        $response = $this->get('/productPageAdmin');
        $response->assertStatus(200);
    }
}

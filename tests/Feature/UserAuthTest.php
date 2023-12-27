<?php

namespace Tests\Feature;

use App\Models\Cart;
use App\Models\User;
use Database\Factories\CartFactory;
use Database\Factories\UserFactory;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class UserAuthTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function user_can_login_with_correct_credentials()
    {

        $user = UserFactory::new()->create(
            [
                'email' => 'test@example.com',
                'password' => bcrypt('password'),
                'phone' => '12345',
                'admin' => 'false',
        ]);

        $response = $this->post('/login', [
            'email' => 'test@example.com',
            'password' => 'password',
            'phone' => '12345',
            'admin' => 'false',
        ]);

        $response->assertRedirect('/');
        $this->assertAuthenticatedAs($user);
    }
}

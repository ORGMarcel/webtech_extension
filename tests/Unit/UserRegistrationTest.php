<?php

namespace Tests\Unit;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class UserRegistrationTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function a_user_can_register()
    {
        $response = $this->post('/userReg', [
            'name' => 'John Doe',
            'email' => 'john@example.com',
            'password' => 'password',
            'rpassword' => 'password',
            'phone' => '12345'
        ]);

        $response->assertRedirect('/');
        $this->assertDatabaseHas('users', ['email' => 'john@example.com']);
        $this->assertTrue(auth()->check());
    }
}

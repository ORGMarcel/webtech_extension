<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class UserRegisterTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     * @test
     */
    public function a_user_can_register(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/userReg')
                    ->assertSee('Create Account')
                    ->type('email','example@example.com')
                    ->type('password', 'password')
                    ->type('rpassword','password')
                    ->type('phone','12345')
                    ->press('Create Account')
                    ->assertPathIs('/');
        });
    }
}

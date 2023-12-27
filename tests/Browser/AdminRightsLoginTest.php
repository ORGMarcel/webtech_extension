<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class AdminRightsLoginTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     * @test
     */
    public function an_admin_can_use_admin_site(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/login')
                ->assertSee('login')
                ->type('email','admin@admin.com')
                ->type('password', 'admin')
                ->press('login')
                ->assertPathIs('/')
                ->assertSee('Admin');
        });
    }
}

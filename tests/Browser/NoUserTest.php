<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class NoUserTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     * @test
     */
    public function no_cart_for_not_logged_user(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/')
                ->assertDontSee('Cart');
        });
    }

}

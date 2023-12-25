<?php

namespace Tests\Feature;

use App\Models\Cart;
use App\Models\Product;
use App\Models\User;
use Database\Factories\CartFactory;
use Database\Factories\ProductFactory;
use Database\Factories\UserFactory;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AddToCartTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function a_user_can_add_a_product_to_the_cart()
    {
        $user = UserFactory::new()->create();
        $product = ProductFactory::new()->create();
        $this->actingAs($user);

        $response = $this->post('/cart/add', [
            'product_id' => $product->id,
            'quantity' => 1,
        ]);

        $response->assertRedirect();
        $this->assertCount(1, Cart::first()->products);
    }
}


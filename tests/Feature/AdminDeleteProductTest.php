<?php

namespace Tests\Feature;

use App\Models\Product;
use App\Models\User;
use Database\Factories\ProductFactory;
use Database\Factories\UserFactory;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AdminDeleteProductTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function an_admin_can_delete_a_product()
    {
        $admin = UserFactory::new()->create(['is_admin' => true]);
        $product = ProductFactory::new()->create();
        $this->actingAs($admin);

        $response = $this->delete("/product/delete/{$product->id}");

        $response->assertRedirect('/products');
        $this->assertDatabaseMissing('products', ['id' => $product->id]);
    }
}

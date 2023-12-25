<?php

namespace Tests\Feature;

use App\Models\Product;
use Database\Factories\ProductFactory;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CreateProductTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function a_product_can_be_created()
    {
        $product = ProductFactory::new()->create([
            'name' => 'Sample Product',
            'price' => 99.99,
// other fields...
        ]);

        $this->assertDatabaseHas('products', [
            'name' => 'Sample Product',
            'price' => 99.99,
// other fields...
        ]);
    }
}

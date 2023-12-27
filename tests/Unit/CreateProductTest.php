<?php

namespace Tests\Unit;

use Database\Factories\ProductFactory;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CreateProductTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function a_product_can_be_created()
    {
        $productData = [
            'name' => 'Sample Product',
            'price' => 99.99,
            'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.',
            'quantity' => 10,
            'product_info1' => 'Info 1',
            'product_info2' => 'Info 2',
            'product_info3' => 'Info 3',
            'product_info4' => 'Info 4',
            'image' => 'https://example.com/image.jpg',
            // other fields...
        ];

        // Use the ProductFactory to create a new Product with the specified attributes
        $product = ProductFactory::new()->create($productData);

        // Assert that the product is stored in the database with the specified attributes
        $this->assertDatabaseHas('products', $productData);
    }
}

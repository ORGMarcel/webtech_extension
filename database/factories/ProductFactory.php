<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    protected $model = Product::class;

    public function definition(): array
    {
        return [
            'name' => $this->faker->word,
            'price' => $this->faker->randomFloat(2, 10, 100),
            'description' => $this->faker->sentence,
            'quantity' => $this->faker->numberBetween(1, 100),
            'product_info1' => $this->faker->word,
            'product_info2' => $this->faker->word,
            'product_info3' => $this->faker->word,
            'product_info4' => $this->faker->word,
            'image' => $this->faker->imageUrl(),
        ];
    }
}

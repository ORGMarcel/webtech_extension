<?php

namespace Database\Factories;

use App\Models\Cart;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Ramsey\Uuid\Type\Integer;

class UserFactory extends Factory
{
    protected $model = User::class;


    public function definition(): array
    {
        $cart = Cart::factory()->create();
        return [
            'email' => $this->faker->unique()->safeEmail,
            'password' => bcrypt('password'),
            'phone' => $this->faker->unique()->randomDigitNotNull(),
            'admin' => 'false',
            'cart_id' => $cart->id
        ];
    }
}

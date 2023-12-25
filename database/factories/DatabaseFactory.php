<?php

namespace Database\Factories;

use App\Models\Cart;
use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class DatabaseFactory
{
    public function configure(): void
    {
        // Register your factories here
        User::factory();
        Product::factory();
        Cart::factory();
    }
}

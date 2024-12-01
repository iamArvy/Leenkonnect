<?php

namespace Database\Factories;

use App\Models\Cart;
use App\Models\Product;
use App\Models\Session;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class CartFactory extends Factory
{
    protected $model = Cart::class;

    public function definition()
    {
        return [
            'user_id' => User::factory(),  // Create a random user
            'product_id' => Product::factory(),  // Create a random product
            'session_id' => Session::factory(),  // Create a random session
            'quantity' => $this->faker->numberBetween(1, 5),  // Random quantity between 1 and 5
        ];
    }
}

<?php

namespace Database\Factories;

use App\Models\Order;
use App\Models\User;
use App\Models\Session;
use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

class OrderFactory extends Factory
{
    protected $model = Order::class;

    public function definition()
    {
        return [
            'order_number' => $this->faker->unique()->numberBetween(1000, 9999),
            'session_id' => Session::factory(),
            'user_id' => User::factory(),  // This will create a user and assign the user ID
            'total' => $this->faker->numberBetween(1000, 10000),
            'status' => $this->faker->randomElement(['pending', 'confirmed', 'shipped', 'delivered', 'cancelled']),
        ];
    }
}

<?php

namespace Database\Factories;

use App\Models\Store\Order;
use App\Models\Store\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

class OrderItemFactory extends Factory
{
    protected $model = \App\Models\Store\OrderItem::class;

    public function definition()
    {
        return [
            'order_id' => Order::factory(),
            'product_id' => Product::factory(),
            'quantity' => $this->faker->numberBetween(1, 5),  // Random quantity between 1 and 5
        ];
    }
}

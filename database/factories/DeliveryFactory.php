<?php

namespace Database\Factories;

use App\Models\Order;
use Illuminate\Database\Eloquent\Factories\Factory;

class DeliveryFactory extends Factory
{
    protected $model = \App\Models\Delivery::class;

    public function definition()
    {
        return [
            'order_id' => Order::factory(),
            'status' => $this->faker->randomElement(['pending', 'shipped', 'delivered']),
            'address' => [
                'street' => $this->faker->streetAddress,
                'city' => $this->faker->city,
                'state' => $this->faker->state,
                'zip' => $this->faker->postcode,
                'country' => $this->faker->country,
            ],
            'phone' => $this->faker->phoneNumber,
            'email' => $this->faker->safeEmail,
        ];
    }
}

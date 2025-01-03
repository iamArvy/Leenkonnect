<?php

namespace Database\Factories\Store;

use App\Models\Store\Order;
use Illuminate\Database\Eloquent\Factories\Factory;

class DeliveryFactory extends Factory
{
    protected $model = \App\Models\Store\Delivery::class;

    public function definition()
    {
        return [
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

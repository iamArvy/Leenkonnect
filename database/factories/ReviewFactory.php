<?php

namespace Database\Factories;

use App\Models\Store\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

class ReviewFactory extends Factory
{
    protected $model = \App\Models\Store\Review::class;

    public function definition()
    {
        return [
            'product_id' => Product::factory(), // Create a random product and associate
            'name' => $this->faker->name,
            'content' => $this->faker->paragraph,
            'rating' => $this->faker->numberBetween(1, 5), // Random rating between 1-5
        ];
    }
}

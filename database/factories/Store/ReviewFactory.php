<?php

namespace Database\Factories\Store;

use App\Models\Store\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

class ReviewFactory extends Factory
{
    protected $model = \App\Models\Store\Review::class;

    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'content' => $this->faker->paragraph,
            'rating' => $this->faker->numberBetween(1, 5), // Random rating between 1-5
        ];
    }
}

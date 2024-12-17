<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class TestimonialFactory extends Factory
{
    protected $model = \App\Models\Testimonial::class;

    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'image' => $this->faker->imageUrl(800, 600),
            'caption' => $this->faker->sentence,
            'occupation' => $this->faker->jobTitle, // Optional occupation
            'content' => $this->faker->paragraph,
        ];
    }
}

<?php

namespace Database\Factories;

use App\Models\Blog;
use Illuminate\Database\Eloquent\Factories\Factory;

class BlogFactory extends Factory
{
    protected $model = Blog::class;

    public function definition()
    {
        return [
            'title' => $this->faker->sentence, // Random title
            'content' => $this->faker->paragraphs(3, true), // Random content as a string, you can change this based on the structure of your content
        ];
    }
}

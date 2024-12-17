<?php

namespace Database\Factories\Blog;

use App\Models\Blog\Blog;
use Illuminate\Database\Eloquent\Factories\Factory;

class BlogFactory extends Factory
{
    protected $model = Blog::class;

    public function definition()
    {
        return [
            'image' => $this->faker->imageUrl(800, 600), // Random image URL
            'title' => $this->faker->sentence, // Random title
            'content' => $this->faker->randomHtml(5, 3), // Random HTML-like content for TipTap editor.
            ];
    }
}

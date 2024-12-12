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
            'category_id' => BlogCategoryFactory::new()->create()->id, // Assuming you have a BlogCategoryFactory
            'image' => $this->faker->imageUrl(800, 600), // Random image URL
            'title' => $this->faker->sentence, // Random title
            'content' =>['text' => $this->faker->paragraphs(3, true), ] , // Random content as a string, you can change this based on the structure of your content
        ];
    }
}

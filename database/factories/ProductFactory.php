<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;
use Faker\Generator as Faker;
use App\Models\Category;

class ProductFactory extends Factory
{
    protected $model = Product::class;

    public function definition()
    {
        return [
            'sku' => $this->faker->unique()->bothify('???-#####'),  // Unique SKU
            'name' => $this->faker->word() . ' ' . $this->faker->word(),  // Random product name
            'image' => $this->faker->imageUrl(800, 600),  // Random image URL
            'category_id' => Category::factory(),  // Random category
            'description' => $this->faker->paragraph(),  // Random product description
            'price' => $this->faker->randomFloat(2, 10, 1000),  // Random price between 10 and 1000
            'gallery' => json_encode([$this->faker->imageUrl(800, 600), $this->faker->imageUrl(800, 600)]),  // Random gallery URLs in JSON
            'stock' => $this->faker->numberBetween(0, 100),  // Random stock number
            'model' => $this->faker->word(),  // Random model
            'brand' => $this->faker->company(),  // Random brand name
            'features' => json_encode([
                'feature_1' => $this->faker->word(),
                'feature_2' => $this->faker->word(),
                'feature_3' => $this->faker->word()
            ]),  // Random features in JSON
            'tags' => json_encode([$this->faker->word(), $this->faker->word()]),  // Random tags in JSON
            'slug' => $this->faker->slug(),  // Random slug for SEO
            'is_active' => $this->faker->boolean(),  // Random active status
            'is_featured' => $this->faker->boolean(),  // Random featured status
            'created_at' => now(),  // Current timestamp
            'updated_at' => now()  // Current timestamp
        ];
    }
}

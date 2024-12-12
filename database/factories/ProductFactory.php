<?php

namespace Database\Factories;

use App\Models\Store\Product;
use Illuminate\Database\Eloquent\Factories\Factory;
use Faker\Generator as Faker;
use App\Models\Store\Category;
use App\Models\Brand;
class ProductFactory extends Factory
{
    protected $model = Product::class;

    public function definition()
    {
        $features = [
            [
                'name' => $this->faker->word(),
                'value' => $this->faker->word(),
            ],
            [
                'name' => $this->faker->word(),
                'value' => $this->faker->word(),
            ],
            [
                'name' => $this->faker->word(),
                'value' => $this->faker->word(),
            ],
        ];
        return [
            'sku' => $this->faker->unique()->bothify('???-#####'),  // Unique SKU
            'name' => $this->faker->word() . ' ' . $this->faker->word(),  // Random product name
            'image' => $this->faker->imageUrl(800, 600),  // Random image URL
            'category_id' => Category::factory(),  // Random category
            'description' => $this->faker->paragraph(),  // Random product description
            'price' => $this->faker->randomFloat(2, 10, 1000),  // Random price between 10 and 1000
            'gallery' => [$this->faker->imageUrl(800, 600), $this->faker->imageUrl(800, 600)],  // Random gallery URLs in JSON
            'stock' => $this->faker->numberBetween(0, 100),  // Random stock number
            'model' => $this->faker->word(),
            'brand_id' => Brand::factory(),
            'features' => $features,
            'tags' =>[$this->faker->word(), $this->faker->word()],  // Random tags in JSON
            'slug' => $this->faker->slug(),  // Random slug for SEO
            'is_active' => $this->faker->boolean(),  // Random active status
            'is_featured' => $this->faker->boolean(),  // Random featured status
            'created_at' => now(),  // Current timestamp
            'updated_at' => now()  // Current timestamp
        ];
    }
}

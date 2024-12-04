<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Product;
use App\Models\Review;
use App\Models\Category;
class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Product::factory()->count(10)->create()->each(function ($product) {
        //     $product->categories()->attach(Category::inRandomOrder()->take(rand(1, 3))->pluck('id'));
        // });
        Category::truncate(); // Clears all categories and cascades to products if setup
        Product::truncate(); // Optional if cascade doesn't handle it
        Review::truncate();  // Optional if cascade doesn't handle it
        $categories = [
            ['name' => 'laptops'],
            ['name' => 'printers']
        ];
        foreach ($categories as $cat) {
            $category = Category::create($cat);
            Product::factory()
                ->count(60)
                ->create(['category_id' => $category->id])
                ->each(function ($product) {
                    Review::factory()->count(5)->create(['product_id' => $product->id]);
                });
        }

    }
}

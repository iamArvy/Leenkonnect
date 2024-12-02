<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Product;
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
        Product::factory()->count(10)->create(['is_featured' => true, 'is_active' => true]);
    }
}

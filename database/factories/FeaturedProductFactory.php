<?php

namespace Database\Factories;

use App\Models\FeaturedProduct;
use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

class FeaturedProductFactory extends Factory
{
    protected $model = FeaturedProduct::class;

    public function definition()
    {
        return [
            'product_id' => Product::factory(),  // Random product for each featured product
        ];
    }
}

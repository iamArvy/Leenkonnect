<?php
namespace App\Repositories;

use App\Models\Store\Review;

class ReviewRepository
{
    public function create(array $data)
    {
        return Review::create($data);
    }

    public function getByProductId($productId)
    {
        return Review::where('product_id', $productId)->get();
    }
}

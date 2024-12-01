<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FeaturedProduct extends Model
{
    use HasFactory;

    // Specify the table name (optional if the table name is plural of the model name)
    protected $table = 'featured_products';

    // Specify which attributes are mass assignable
    protected $fillable = [
        'product_id',  // The foreign key linking to the product
    ];

    // Define the relationship with the Product model
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Product extends Model
{
    use HasFactory;

    // Specify the table name (optional if the table name is plural of the model name)
    protected $table = 'products';

    // Specify which attributes are mass assignable
    protected $fillable = [
        'sku',
        'name',
        'image',
        'category_id',
        'description',
        'price',
        'gallery',
        'model',
        'brand',
        'features',
        'tags',
    ];

    // Specify which attributes should be cast to specific types
    protected $casts = [
        'gallery' => 'array',  // Cast the 'gallery' field to an array
        'features' => 'array', // Cast the 'features' field to an array
        'tags' => 'array',     // Cast the 'tags' field to an array
    ];

    // Automatically generate a slug if it's not provided
    public static function boot()
    {
        parent::boot();

        static::creating(function ($product) {
            if (empty($product->slug)) {
                // Automatically generate a slug based on name, brand, and model
                $product->slug = Str::slug($product->name . '-' . $product->brand . '-' . $product->model);
            }
        });
    }

    // Mutator to ensure tags are stored as lowercase
    public function setTagsAttribute($value)
    {
        // Ensure that tags are always stored as an array of lowercase strings
        $this->attributes['tags'] = json_encode(array_map('strtolower', (array) $value));
    }

    // Example of a custom scope (optional)
    public function scopeInStock($query)
    {
        return $query->where('stock', '>', 0);  // Filter products that are in stock
    }

    public function scopeIsFeatured($query)
    {
        return $query->where('is_featured', true);  // Filter products that are featured
    }

    public function scopeIsActive($query)
    {
        return $query->where('is_active', true);  // Filter products that are active
    }

    // Example of a custom accessor (optional)
    public function getPriceAttribute($value)
    {
        return number_format($value, 2); // Format the price to 2 decimal places
    }

    public function category() {
        return $this->belongsTo(Category::class);
    }

    public function reviews() {
        return $this->hasMany(Review::class);
    }

    public function reduceStock($quantity)
    {
        $this->stock -= $quantity;
        $this->save();
    }

    public function addStock($quantity)
    {
        $this->stock += $quantity;
        $this->save();
    }

    public function changeFeaturedStatus()
    {
        $this->is_featured = !$this->is_featured;
        $this->save();
    }

    public function changeActiveStatus()
    {
        $this->is_active = !$this->is_active;
        $this->save();
    }
}

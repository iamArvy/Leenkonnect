<?php

namespace App\Models\Store;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'content',
        'rating',
    ];

    /**
     * Relationship with the Product model.
     */
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}

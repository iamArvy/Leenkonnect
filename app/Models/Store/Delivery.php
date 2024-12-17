<?php

namespace App\Models\Store;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Delivery extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_id',
        'name',
        'status',
        'address',
        'phone',
        'email',
    ];

    protected $casts = [
        'address' => 'array',
    ];

    /**
     * Relationship with the Order model.
     */
    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    /**
     * Accessor for the address attribute to decode JSON.
     */
    public function getAddressAttribute($value)
    {
        return json_decode($value, true);
    }

    /**
     * Mutator for the address attribute to encode JSON.
     */
    public function setAddressAttribute($value)
    {
        $this->attributes['address'] = json_encode($value);
    }
}

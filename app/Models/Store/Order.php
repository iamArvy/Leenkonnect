<?php

namespace App\Models\Store;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Order extends Model
{
    use HasFactory;

    // Specify the table name (optional if the table name is plural of the model name)
    protected $table = 'orders';

    // Specify which attributes are mass assignable
    protected $fillable = [
        'order_number',
        'session_id',
        'user_id',
        'total',
        'status',
    ];

    // Specify the casts for certain attributes, if necessary
    protected $casts = [
        'total' => 'integer',
        'status' => 'string',  // Enum field, no need for casting
    ];

    // Relationship: An order belongs to a user (optional, since user is nullable)
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function statuslist()
    {
        return ['pending', 'confirmed', 'shipped', 'delivered', 'cancelled'];
    }

    // Relationship: An order has many order items
    public function orderItems()
    {
        return $this->hasMany(OrderItem::class);
    }

    // Accessor or method to get a more readable order status
    public function getStatusAttribute($value)
    {
        return ucfirst($value); // Capitalize the status for better readability
    }
}

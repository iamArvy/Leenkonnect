<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContactMessage extends Model
{
    use HasFactory;

    protected $fillable = [
        'session_id',
        'email',
        'name',
        'subject',
        'content',
    ];

    // Define the relationship with the Session model
    public function session()
    {
        return $this->belongsTo(Session::class);
    }

    // Optional: You can define an accessor for the 'content' field if you need to handle it as an array or object
    // Example: To get the content as an array
    public function getContentAttribute($value)
    {
        return json_decode($value, true);
    }
}

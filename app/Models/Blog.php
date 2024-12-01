<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'content',
    ];

    protected $casts = [
        'content' => 'array', // Automatically cast the 'content' column to an array (JSON)
    ];
}

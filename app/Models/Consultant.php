<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Consultant extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
    ];

    // Define the relationship with the ConsultationService model
    public function service()
    {
        return $this->belongsTo(ConsultationService::class, 'service_id');
    }

    // Define the relationship with the Booking model
    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }
}

<?php

namespace App\Models\Consultation;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Specialisation extends Model
{
    /** @use HasFactory<\Database\Factories\Consultation\SpecialisationFactory> */
    use HasFactory;
    protected $fillable = [
        'name',
        // 'price',
        'description',
        // 'duration',
        // 'is_active',
    ];

    public function consultants()
    {
        return $this->belongsToMany(Consultant::class);
    }

    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }
}

<?php

namespace App\Models\Consultation;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    /** @use HasFactory<\Database\Factories\Consultation\BookingFactory> */
    use HasFactory;
    protected $fillable = [
        'name',
        'email',
        'booking_number',
        'specialisation_id',
        'consultant_id',
        'date',
        'time',
        'status',
    ];

    public function specialisation()
    {
        return $this->belongsTo(Specialisation::class);
    }

    public function consultant()
    {
        return $this->belongsTo(Consultant::class);
    }
}

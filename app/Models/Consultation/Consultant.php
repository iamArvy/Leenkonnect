<?php

namespace App\Models\Consultation;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Consultant extends Model
{
    /** @use HasFactory<\Database\Factories\Consultation\ConsultantsFactory> */
    use HasFactory;
    protected $table = 'consultants';
    protected $fillable = [
        'name',
        'email',
        'phone',
        'specialisation_id',
        'payment_information'
    ];

    protected $casts = [
        'payment_information' => 'array',
    ];

    public function specialisation()
    {
        return $this->belongsTo(Specialisation::class, 'specialisation_id');
    }

    public function bookings()
    {
        return $this->hasMany(Bookings::class, 'consultant_id');
    }
}

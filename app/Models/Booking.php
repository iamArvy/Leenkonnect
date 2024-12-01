<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    protected $fillable = [
        'service_id',
        'user_id',
        'session_id',
        'consultant_id',
    ];

    // Define the relationship with the ConsultationService model
    public function service()
    {
        return $this->belongsTo(ConsultationService::class, 'service_id');
    }

    // Define the relationship with the User model
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    // Define the relationship with the Consultant model
    public function consultant()
    {
        return $this->belongsTo(Consultant::class, 'consultant_id');
    }

    // Define the relationship with the Session model
    public function session()
    {
        return $this->belongsTo(Session::class, 'session_id');
    }
}

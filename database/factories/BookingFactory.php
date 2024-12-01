<?php

namespace Database\Factories;

use App\Models\Booking;
use App\Models\Consultant;
use App\Models\ConsultationService;
use App\Models\User;
use App\Models\Session;
use Illuminate\Database\Eloquent\Factories\Factory;

class BookingFactory extends Factory
{
    protected $model = Booking::class;

    public function definition()
    {
        return [
            'service_id' => ConsultationService::factory(),  // Associate with a random consultation service
            'user_id' => User::factory(),  // Random user (nullable for guest bookings)
            'session_id' => Session::factory(),  // Random session ID
            'consultant_id' => Consultant::factory(),  // Associate with a random consultant
        ];
    }
}

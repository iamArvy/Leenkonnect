<?php

namespace Database\Factories;

use App\Models\Consultation\Consultant;
use App\Models\Consultation\Service;
use Illuminate\Database\Eloquent\Factories\Factory;

class ConsultantFactory extends Factory
{
    protected $model = Consultant::class;

    public function definition()
    {
        return [
            'name' => $this->faker->name,  // Random name for the consultant
            'service_id' => ConsultationService::factory(),  // Associate with a random consultation service
        ];
    }
}

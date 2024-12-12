<?php

namespace Database\Factories;

use App\Models\Consultation\Service;
use Illuminate\Database\Eloquent\Factories\Factory;

class ConsultationServiceFactory extends Factory
{
    protected $model = ConsultationService::class;

    public function definition()
    {
        return [
            'name' => $this->faker->unique()->word,  // Generate a unique name for the service
            'price' => $this->faker->randomFloat(2, 10, 100),  // Random price between 10 and 100 with 2 decimals
            'description' => $this->faker->paragraph,  // Random description
        ];
    }
}

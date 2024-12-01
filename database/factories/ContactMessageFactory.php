<?php

namespace Database\Factories;

use App\Models\ContactMessage;
use App\Models\Session;
use Illuminate\Database\Eloquent\Factories\Factory;

class ContactMessageFactory extends Factory
{
    protected $model = ContactMessage::class;

    public function definition()
    {
        return [
            'session_id' => Session::factory(),  // Generate a random session
            'email' => $this->faker->email,  // Random email
            'name' => $this->faker->name,  // Random name
            'subject' => $this->faker->sentence,  // Random subject line
            'content' => json_encode([
                'message' => $this->faker->paragraph,  // Random content in JSON format
            ]),
        ];
    }
}

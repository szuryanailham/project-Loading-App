<?php

namespace Database\Factories;

use App\Models\Event;
use Illuminate\Database\Eloquent\Factories\Factory;
class RegistrationFactory extends Factory
{
    public function definition(): array
    {
        return [
    'name'          => $this->faker->name(),
    'email'         => $this->faker->unique()->safeEmail(),
    'phone'         => $this->faker->phoneNumber(),
    'birth_date'    => $this->faker->date(),
    'gender'        => $this->faker->randomElement(['male', 'female']),
    'source'        => $this->faker->randomElement(['social_media', 'friend', 'school', 'other']),
    'payment_proof' => null, 
    'event_id'      => Event::factory(), 
    'status'        => $this->faker->randomElement(['pending', 'approved', 'rejected']), 
    'notes'         => $this->faker->sentence(), 
];

    }
}

<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Event>
 */
class EventFactory extends Factory
{
    protected $model = \App\Models\Event::class;

    public function definition(): array
    {
        return [
            'name' => $this->faker->sentence(3),
            'poster_img' => null, // bisa disesuaikan jika mau pakai faker image
            'slug' => Str::slug($this->faker->sentence(3)), 
            'description' => $this->faker->paragraph(),
            'date' => $this->faker->date(),
            'event_type' => $this->faker->randomElement(['offline', 'online']),
            'location' => $this->faker->city(),
            'price_type' => $this->faker->randomElement(['free', 'paid']),
            'price' => $this->faker->randomElement([null, $this->faker->numberBetween(50000, 500000)]),
            'external_link' => $this->faker->optional()->url(),
        ];
    }
}

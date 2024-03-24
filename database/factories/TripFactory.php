<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Trip>
 */
class TripFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $startDate = $this->faker->dateTimeBetween('now', '+2 years');
        $endDate = $this->faker->dateTimeBetween($startDate, '+2 years');

        $minTavelers = $this->faker->numberBetween(1,5);
        $maxTavelers = $minTavelers + $this->faker->numberBetween(1,5);


        return [
            'destination' => $this->faker->city,
            'startDate' => $startDate,
            'endDate' => $endDate,
            'timespan' => $this->faker->boolean,
            'description' => $this->faker->paragraph,
            'vehicle' => $this->faker->randomElement(['car', 'plane', 'train', 'motorbike']),
            'image_link' => $this->faker->imageUrl(),
            'trip_link' => $this->faker->url(),
            'name' => $this->faker->city,
            'min_travelers' => $minTavelers,
            'max_travelers' => $maxTavelers

        ];
    }
}

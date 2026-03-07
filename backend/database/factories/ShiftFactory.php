<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Shift>
 */
class ShiftFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $startHour = $this->faker->numberBetween(6, 16);
        $startTime = sprintf('%02d:00:00', $startHour);
        $endTime = sprintf('%02d:00:00', $startHour + 8);

        return [
            'name' => $this->faker->unique()->randomElement(['Pagi', 'Siang', 'Malam', 'Shift 1', 'Shift 2', 'Shift 3']),
            'start_time' => $startTime,
            'end_time' => $endTime,
        ];
    }
}

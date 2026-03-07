<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\AttendanceLocation>
 */
class AttendanceLocationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->unique()->randomElement([
                'Office - Lantai 1',
                'Office - Lantai 2',
                'Office - Lantai 3',
                'Meeting Room A',
                'Meeting Room B',
                'Warehouse',
                'Production Floor',
                'Admin Area'
            ]),
            'latitude' => $this->faker->latitude(),
            'longitude' => $this->faker->longitude(),
            'radius_meter' => $this->faker->numberBetween(10, 50),
            'qr_token' => Str::random(32),
            'is_active' => $this->faker->boolean(90),
        ];
    }
}

<?php

namespace Database\Seeders;

use App\Models\AttendanceLocation;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class AttendanceLocationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $locations = [
            [
                'name' => 'Kantor Pusat - Lantai 1',
                'latitude' => -6.2088,
                'longitude' => 106.8456,
                'radius_meter' => 20,
                'qr_token' => Str::random(32),
                'is_active' => true,
            ],
            [
                'name' => 'Kantor Pusat - Lantai 2',
                'latitude' => -6.2089,
                'longitude' => 106.8457,
                'radius_meter' => 20,
                'qr_token' => Str::random(32),
                'is_active' => true,
            ],
            [
                'name' => 'Kantor Cabang',
                'latitude' => -6.2500,
                'longitude' => 106.8200,
                'radius_meter' => 30,
                'qr_token' => Str::random(32),
                'is_active' => true,
            ],
            [
                'name' => 'Warehouse',
                'latitude' => -6.3500,
                'longitude' => 106.9500,
                'radius_meter' => 50,
                'qr_token' => Str::random(32),
                'is_active' => true,
            ],
        ];

        foreach ($locations as $location) {
            AttendanceLocation::firstOrCreate(
                ['name' => $location['name']],
                [
                    'latitude' => $location['latitude'],
                    'longitude' => $location['longitude'],
                    'radius_meter' => $location['radius_meter'],
                    'qr_token' => $location['qr_token'],
                    'is_active' => $location['is_active'],
                ]
            );
        }
    }
}

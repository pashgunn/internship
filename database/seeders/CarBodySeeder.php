<?php

namespace Database\Seeders;

use App\Models\CarBody;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CarBodySeeder extends Seeder
{
    public function run(): void
    {
        $vehicleTypes = [
            'hatchback', 'sedan', 'small', 'convertible', 'SUV', 'MPV', 'coupe', 'station wagon'
        ];

        foreach ($vehicleTypes as $vehicleType) {
            CarBody::factory([
                'name' => $vehicleType
            ])->create();
        }
    }
}

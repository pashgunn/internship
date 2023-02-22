<?php

namespace Database\Seeders;

use App\Models\CarEngine;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CarEngineSeeder extends Seeder
{
    public function run(): void
    {
        $vehicleFuelTypes = [
            'gas', 'electric', 'diesel', 'hybrid'
        ];

        foreach ($vehicleFuelTypes as $vehicleFuelType) {
            CarEngine::factory([
                'name' => $vehicleFuelType
            ])->create();
        }
    }
}

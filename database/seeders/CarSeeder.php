<?php

namespace Database\Seeders;

use App\Models\Car;
use App\Models\CarBody;
use App\Models\CarClass;
use App\Models\CarEngine;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Car::factory()
            ->count(20)
            ->sequence(fn ($sequence) => [
                'car_class_id' => CarClass::get()->random(),
                'car_body_id' => rand(0, 1) ? CarBody::get()->random() : null,
                'car_engine_id' => CarEngine::get()->random()
            ])
            ->create();
    }
}

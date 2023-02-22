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
        $classes = CarClass::get();
        $bodies = CarBody::get();
        $engines = CarEngine::get();

        Car::factory()
            ->count(20)
            ->sequence(fn ($sequence) => [
                'car_class_id' => $classes->random(),
                'car_body_id' => rand(0, 1) ? $bodies->random() : null,
                'car_engine_id' => $engines->random()
            ])
            ->create();
    }
}

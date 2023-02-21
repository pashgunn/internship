<?php

namespace Database\Factories;

use App\Models\CarBody;
use App\Models\CarClass;
use App\Models\CarEngine;
use Faker\Provider\Fakecar;
use Illuminate\Database\Eloquent\Factories\Factory;

class CarFactory extends Factory
{
    public function definition()
    {
        $this->faker->addProvider(new Fakecar($this->faker));

        return [
            'name' => $this->faker->vehicle(),
            'body' => $this->faker->text(),
            'price' => $this->faker->numberBetween(1000000, 2000000),
            'old_price' => $this->faker->numberBetween(2000000, 3000000),
            'salon' => $this->faker->words(3, true),
            'car_class_id' => CarClass::factory(),
            'kpp' => $this->faker->vehicleGearBoxType(),
            'year' => $this->faker->numberBetween(2000, 2023),
            'color' => $this->faker->colorName(),
            'car_body_id' => CarBody::factory(),
            'car_engine_id' => CarEngine::factory(),
            'is_new' => (bool) rand(0, 1)
        ];
    }
}

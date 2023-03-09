<?php

namespace Database\Seeders;

use App\Models\Car;
use App\Models\CarBody;
use App\Models\CarClass;
use App\Models\CarEngine;
use App\Models\Category;
use App\Models\Image;
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
        $categories = Category::get();
        $images = Image::get();

        $cars = Car::factory()
            ->count(20)
            ->sequence(fn ($sequence) => [
                'car_class_id' => $classes->random(),
                'car_body_id' => rand(0, 1) ? $bodies->random() : null,
                'car_engine_id' => $engines->random(),
                'category_id' => $categories->random(),
                'image_id' => $images->random(),
            ])
            ->create();

        foreach ($cars as $car) {
            $carImages = $images->slice($car->id, 1);
            $car->images()->attach($carImages->pluck('id'));
        }
    }
}

<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Smknstd\FakerPicsumImages\FakerPicsumImagesProvider;


class ImageFactory extends Factory
{

    public function definition()
    {
        $this->faker->addProvider(new FakerPicsumImagesProvider($this->faker));
        $fakerFileName = $this->faker->image(
            storage_path("app/public/images"),
            800,
            600
        );
        return [
            'path' => "images/" . basename($fakerFileName),
        ];
    }
}

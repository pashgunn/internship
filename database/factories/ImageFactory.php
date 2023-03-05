<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Smknstd\FakerPicsumImages\FakerPicsumImagesProvider;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Image>
 */
class ImageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $this->faker->addProvider(new FakerPicsumImagesProvider($this->faker));
        $fakerFileName = $this->faker->image(
            storage_path("app/public"),
            800,
            600
        );

        return [
            'name' => "storage/" . basename($fakerFileName),
        ];
    }
}

<?php

namespace Database\Factories;

use App\Models\Article;
use App\Models\Image;
use Illuminate\Database\Eloquent\Factories\Factory;

class ArticleFactory extends Factory
{
    protected $model = Article::class;

    public function published(): ArticleFactory
    {
        return $this->state(function () {
            return [
                'published_at' => $this->faker->dateTimeThisMonth()
            ];
        });
    }

    public function definition(): array
    {
        return [
            'slug' => $this->faker->unique()->slug(1),
            'title' => $this->faker->sentence(3),
            'description' => $this->faker->text(),
            'body' => $this->faker->paragraphs(1,asText: true),
            'image_id' => Image::factory(),
            'published_at' => $this->faker->boolean() ? $this->faker->dateTimeThisMonth() : null,
        ];
    }
}

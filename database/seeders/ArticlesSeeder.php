<?php

namespace Database\Seeders;

use App\Models\Article;
use App\Models\Image;
use App\Models\Tag;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ArticlesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $images = Image::get();
        $tags = Tag::factory()->count(10)->create();

        $articles = Article::factory()
            ->count(10)
            ->published()
            ->sequence(fn ($sequence) => [
                'image_id' => $images->random(),
            ])
            ->create();

        Article::factory()
            ->count(10)
            ->sequence(fn ($sequence) => [
                'image_id' => $images->random(),
            ])
            ->create();

        $tagsCount = rand(1, 5);
        $articles->each( function ($article) use ($tags, $tagsCount) {
            return $article->tags()->attach($tags->random($tagsCount));
        });
    }
}

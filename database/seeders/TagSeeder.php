<?php

namespace Database\Seeders;

use App\Models\Article;
use App\Models\Tag;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Tag::factory()->count(10)->create();

        Article::get()->each( function ($article) {
            $this->attachTags($article);
        });
    }

    public function attachTags(Article $article): void
    {
        $tagCount = rand(0, 5);
        $tags = Tag::get();
        $article->tags()->attach($tags->random($tagCount));
    }
}

<?php

namespace App\Services;

use App\Contracts\Repositories\ImageRepositoryContract;
use App\Contracts\Repositories\TagsSynchronizerContract;
use App\Contracts\Repositories\UpdateArticleServiceContract;
use App\Http\Requests\ArticleRequest;
use App\Models\Article;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;

class UpdateArticleService implements UpdateArticleServiceContract
{
    public function __construct(
        private readonly TagsSynchronizerContract  $tagsSynchronizer,
        private readonly ImageRepositoryContract   $imageRepository
    ) {
    }

    public function update(Article $article, ArticleRequest $articleRequest, Collection $tags, UploadedFile $file): void
    {
        $image = $this->imageRepository->imageCreate($file);

        $fields = $articleRequest->validated();
        $fields['image_id'] = $image->id;

        DB::transaction(function () use ($fields, $tags, $article) {
            $article->update($fields);

            $this->tagsSynchronizer->sync($tags, $article);
        });

        Cache::tags(['articles'])->flush();
    }
}

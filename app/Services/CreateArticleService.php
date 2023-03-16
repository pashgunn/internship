<?php

namespace App\Services;

use App\Contracts\Repositories\ArticleRepositoryContract;
use App\Contracts\Repositories\CreateArticleServiceContract;
use App\Contracts\Repositories\ImageRepositoryContract;
use App\Contracts\Repositories\TagsSynchronizerContract;
use App\Http\Requests\ArticleRequest;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;

class CreateArticleService implements CreateArticleServiceContract
{
    public function __construct(
        private readonly ArticleRepositoryContract $articleRepository,
        private readonly TagsSynchronizerContract  $tagsSynchronizer,
        private readonly ImageRepositoryContract   $imageRepository
    ) {
    }

    public function create(ArticleRequest $articleRequest, Collection $tags, UploadedFile $file): void
    {
        $image = $this->imageRepository->imageCreate($file);

        $fields = $articleRequest->validated();
        $fields['image_id'] = $image->id;

        DB::transaction(function () use ($fields, $tags) {
            $article = $this->articleRepository->create($fields);

            $this->tagsSynchronizer->sync($tags, $article);
        });
    }
}

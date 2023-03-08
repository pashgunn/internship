<?php

namespace App\Services;

use App\Contracts\Repositories\ArticleCreateUpdateServiceContract;
use App\Contracts\Repositories\ArticleRepositoryContract;
use App\Contracts\Repositories\ImageRepositoryContract;
use App\Contracts\Repositories\TagsSynchronizerContract;
use App\Http\Requests\ArticleRequest;
use App\Models\Article;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Cache;

class ArticleCreateUpdateService implements ArticleCreateUpdateServiceContract
{
    public function __construct(
        private readonly ArticleRepositoryContract $articleRepository,
        private readonly TagsSynchronizerContract  $tagsSynchronizer,
        private readonly ImageRepositoryContract   $imageRepository
    ) {
    }

    private function prepareArticleFields(ArticleRequest $articleRequest, Model $image): array
    {
        $fields = $articleRequest->validated();
        $fields['published_at'] = $articleRequest->getPublishedAt();
        $fields['image_id'] = $image->id;
        unset($fields['image']);
        return $fields;
    }

    public function create(ArticleRequest $articleRequest, Collection $tags, UploadedFile $file): void
    {
        $image = $this->imageRepository->imageCreate($file);
        $fields = $this->prepareArticleFields($articleRequest, $image);

        $article = $this->articleRepository->create($fields);

        //delete cache for articles
        Cache::tags(['articles'])->flush();

        $this->tagsSynchronizer->sync($tags, $article);
    }

    public function update(Article $article, ArticleRequest $articleRequest, Collection $tags, UploadedFile $file): void
    {
        $image = $this->imageRepository->imageCreate($file);
        $fields = $this->prepareArticleFields($articleRequest, $image);

        $article->update($fields);

        //delete cache for articles
        Cache::tags(['articles'])->flush();

        $this->tagsSynchronizer->sync($tags, $article);
    }

}

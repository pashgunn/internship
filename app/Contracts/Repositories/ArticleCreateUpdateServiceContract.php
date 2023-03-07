<?php

namespace App\Contracts\Repositories;

use App\Http\Requests\ArticleRequest;
use App\Models\Article;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Collection;

interface ArticleCreateUpdateServiceContract
{
    public function create(ArticleRequest $articleRequest, Collection $tags, UploadedFile $file): void;
    public function update(Article $article, ArticleRequest $articleRequest, Collection $tags, UploadedFile $file): void;
}

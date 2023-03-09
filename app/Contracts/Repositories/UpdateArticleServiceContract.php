<?php

namespace App\Contracts\Repositories;

use App\Http\Requests\ArticleRequest;
use App\Models\Article;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Collection;

interface UpdateArticleServiceContract
{
    public function update(Article $article, ArticleRequest $articleRequest, Collection $tags, UploadedFile $file): void;
}

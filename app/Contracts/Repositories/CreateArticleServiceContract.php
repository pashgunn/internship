<?php

namespace App\Contracts\Repositories;

use App\Http\Requests\ArticleRequest;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Collection;

interface CreateArticleServiceContract
{
    public function create(ArticleRequest $articleRequest, Collection $tags, UploadedFile $file): void;
}

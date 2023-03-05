<?php

namespace App\Contracts\Repositories;

use App\Models\Article;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

interface ArticleRepositoryContract
{
    public function homepageArticles(int $paginatesCount): Collection;
    public function getCatalog(int $paginatesCount): LengthAwarePaginator;
    public function find(int|string $id): ?Article;
}

<?php

namespace App\Contracts\Repositories;

use App\Models\Article;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

interface ArticleRepositoryContract
{
    public function homepageArticles(int $paginatesCount): Collection;
    public function getArticlesCatalog(int $page, int $paginatesCount): LengthAwarePaginator;
    public function findBySlug(string $slug): ?Article;
}

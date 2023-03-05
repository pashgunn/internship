<?php

namespace App\Contracts\Repositories;

use App\Models\Article;
use Illuminate\Database\Eloquent\Collection;

interface ArticleRepositoryContract
{
    public function homepageArticles(int $paginatesCount): Collection;
    public function update($id,array $attributes): bool;
    public function find(int|string|Article $id): ?Article;
}

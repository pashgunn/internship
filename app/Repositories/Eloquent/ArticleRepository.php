<?php

namespace App\Repositories\Eloquent;

use App\Contracts\Repositories\ArticleRepositoryContract;
use App\Models\Article;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

class ArticleRepository extends BaseRepository implements ArticleRepositoryContract
{
    public function __construct(Article $model)
    {
        parent::__construct($model);
    }

    public function homepageArticles(int $paginatesCount): Collection
    {
        return $this->model->with('tags')->latest('published_at')->limit($paginatesCount)->get();
    }

    public function getCatalog(int $paginatesCount): LengthAwarePaginator
    {
        return $this->model
            ->whereNotNull('published_at')
            ->with('tags')
            ->latest('published_at')
            ->paginate($paginatesCount);
    }

    public function findBySlug(string $slug): ?Article
    {
        return $this->model->where('slug', $slug)->first();
    }
}

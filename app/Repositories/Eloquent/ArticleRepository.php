<?php

namespace App\Repositories\Eloquent;

use App\Contracts\Repositories\ArticleRepositoryContract;
use App\Models\Article;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;

class ArticleRepository extends BaseRepository implements ArticleRepositoryContract
{
    public function __construct(Article $model)
    {
        parent::__construct($model);
    }

    public function homepageArticles(int $paginatesCount): Collection
    {
        $cacheKey = 'homepageArticles:' . $paginatesCount;
        $cacheDuration = now()->addHour();
        return Cache::tags(['homepage', 'articles', 'tags', 'images'])
            ->remember($cacheKey, $cacheDuration,
                fn() => $this->model->with('tags', 'image')->latest('published_at')->limit($paginatesCount)->get());
    }

    public function getArticlesCatalog(int $page, int $paginatesCount): LengthAwarePaginator
    {
        $cacheKey = 'articlePage:' . $page . ' articlesPerPage:' . $paginatesCount;
        $cacheDuration = now()->addHour();
        return Cache::tags(['catalog', 'articles', 'tags', 'images'])
            ->remember($cacheKey, $cacheDuration, fn() => $this->model
                ->whereNotNull('published_at')
                ->with('tags', 'image')
                ->latest('published_at')
                ->paginate($paginatesCount));
    }

    public function findBySlug(string $slug): ?Article
    {
        $cacheKey = 'findBySlug:' . $slug;
        $cacheDuration = now()->addHour();
        return Cache::tags(['catalog', 'articles', 'tags', 'images'])
            ->remember($cacheKey, $cacheDuration, fn() => $this->model->with('tags','image')->firstWhere('slug', $slug));
    }

    public function longestArticle(): Article
    {
        return $this->model->select(['id', 'title', DB::raw('LENGTH(body) as length')])->orderByDesc('length')->first();
    }

    public function shortestArticle(): Article
    {
        return $this->model->select(['id', 'title', DB::raw('LENGTH(body) as length')])->orderBy('length')->first();
    }

    public function taggedArticle(): Article
    {
        return $this->model->select(['id', 'title'])->withCount('tags')->orderByDesc('tags_count')->first();
    }
}

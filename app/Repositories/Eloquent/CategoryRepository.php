<?php

namespace App\Repositories\Eloquent;

use App\Contracts\Repositories\CategoryRepositoryContract;
use App\Models\Category;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Cache;

class CategoryRepository extends BaseRepository implements CategoryRepositoryContract
{
    public function __construct(Category $model)
    {
        parent::__construct($model);
    }

    public function getCategoriesTreeId(string $id): Collection
    {
        $cacheKey = 'category:' . $id;
        $cacheDuration = now()->addHour();

        return Cache::tags(['category', 'cars'])
            ->remember($cacheKey, $cacheDuration,
                fn() => $this->model
                    ->descendantsAndSelf($this->model
                        ->firstWhere('slug', $id)->id)->pluck('id'));
    }

    public function categoriesToTree(): Collection
    {
        return $this->model->withDepth()->having('depth', '<', 3)->get()->toTree()->sortBy('sort')->map(function ($category) {
            if ($category->descendants->isNotEmpty()) {
                $category->descendants = $category->descendants->sortBy('sort');
            }
            return $category;
        });
    }

    public function findBySlug(string $slug): ?Category
    {
        return $this->model->firstWhere('slug', $slug);
    }
}

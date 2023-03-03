<?php

namespace App\Repositories\Eloquent;

use App\Contracts\Repositories\CategoryRepositoryContract;
use App\Models\Category;
use Illuminate\Support\Collection;

class CategoryRepository extends BaseRepository implements CategoryRepositoryContract
{
    public function __construct(Category $model)
    {
        parent::__construct($model);
    }

    public function getCategoriesTree(string $id): Collection
    {
        $category = $this->model->where('slug', $id)->first();
        // Get ids of descendants
        $categories = $category->descendants()->pluck('id');
        // Include the id of category itself
        $categories[] = $category->getKey();
        return $categories;
    }

    public function categoriesToTree(): Collection
    {
        return $this->model->withDepth()->having('depth', '<', 3)->get()->toTree()->sortBy('sort')->map(function ($category) {
            if($category->descendants->isNotEmpty()) {
                $category->descendants = $category->descendants->sortBy('sort');
            }
            return $category;
        });
    }
}

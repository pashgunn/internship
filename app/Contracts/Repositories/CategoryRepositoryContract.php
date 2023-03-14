<?php

namespace App\Contracts\Repositories;


use App\Models\Category;
use Illuminate\Support\Collection;

interface CategoryRepositoryContract
{
    public function getCategoriesTreeId(string $id): Collection;
    public function categoriesToTree(): Collection;
    public function findBySlug(string $slug): ?Category;
}

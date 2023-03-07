<?php

namespace App\Contracts\Repositories;


use Illuminate\Support\Collection;

interface CategoryRepositoryContract
{
    public function getCategoriesTree(string $id): Collection;
    public function categoriesToTree(): Collection;
}

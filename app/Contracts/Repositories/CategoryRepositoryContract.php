<?php

namespace App\Contracts\Repositories;


use Illuminate\Support\Collection;

interface CategoryRepositoryContract
{
    public function getCategoriesTreeId(string $id): Collection;
    public function categoriesToTree(): Collection;
}

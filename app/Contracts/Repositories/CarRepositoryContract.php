<?php

namespace App\Contracts\Repositories;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

interface CarRepositoryContract
{
    public function homepageCars(int $paginatesCount): Collection;
    public function forClients(): Collection;
    public function catalogWithCategory(int $page, \Illuminate\Support\Collection $categoriesId, int $paginatesCount): LengthAwarePaginator;
    public function getCarCatalog(int $page, int $paginatesCount): LengthAwarePaginator;
}

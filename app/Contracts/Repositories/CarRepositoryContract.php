<?php

namespace App\Contracts\Repositories;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

interface CarRepositoryContract
{
    public function homepageCars(int $paginatesCount): Collection;
    public function forClients(): Collection;
    public function catalogWithCategory(\Illuminate\Support\Collection $categories, int $paginatesCount): LengthAwarePaginator;
}

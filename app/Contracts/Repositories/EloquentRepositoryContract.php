<?php

namespace App\Contracts\Repositories;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Pagination\LengthAwarePaginator;

interface EloquentRepositoryContract
{
    public function create(array $attributes): Model;
    public function delete(int $id): bool;
    public function find(int $id): ?Model;
    public function update(array $attributes): bool;
    public function getCatalog(int $paginatesCount): LengthAwarePaginator;
}

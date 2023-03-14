<?php

namespace App\Repositories\Eloquent;

use App\Contracts\Repositories\EloquentRepositoryContract;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Pagination\LengthAwarePaginator;

class BaseRepository implements EloquentRepositoryContract
{
    protected Model $model;

    /**
     * BaseRepository constructor.
     */
    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    public function create(array $attributes): Model
    {
        return $this->model->create($attributes);
    }

    public function delete(string $id): bool
    {
        return $this->model->firstWhere('slug', $id)->delete();
    }

    public function find(int $id): ?Model
    {
        return $this->model->find($id);
    }

    public function getCatalog(int $paginatesCount): LengthAwarePaginator
    {
        return $this->model->paginate($paginatesCount);
    }
}

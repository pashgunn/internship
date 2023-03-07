<?php

namespace App\Repositories\Eloquent;

use App\Contracts\Repositories\CarRepositoryContract;
use App\Models\Car;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

class CarRepository extends BaseRepository implements CarRepositoryContract
{
    public function __construct(Car $model)
    {
        parent::__construct($model);
    }

    public function homepageCars(int $paginatesCount): Collection
    {
        return $this->model->where('is_new', true)->limit($paginatesCount)->get();
    }

    public function forClients(): Collection
    {
        return $this->model->with('carBody', 'carEngine', 'carClass')->get();
    }

    public function catalogWithCategory(\Illuminate\Support\Collection $categories, int $paginatesCount): LengthAwarePaginator
    {
        return $this->model->whereIn('category_id', $categories)->paginate($paginatesCount);
    }
}

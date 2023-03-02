<?php

namespace App\Repositories\Eloquent;

use App\Contracts\Repositories\CarRepositoryContract;
use App\Models\Car;
use Illuminate\Database\Eloquent\Collection;

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
}

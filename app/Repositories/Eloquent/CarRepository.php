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

    public function homepageCars(): Collection
    {
        return $this->model->where('is_new', '1')->limit(4)->get();
    }

    public function forClients(): Collection
    {
        return $this->model->with('carBody', 'carEngine', 'carClass')->get();
    }
}

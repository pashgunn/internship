<?php

namespace App\Repositories\Eloquent;

use App\Contracts\Repositories\CarApiRepositoryContract;
use App\Models\Car;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class CarApiRepository extends BaseRepository implements CarApiRepositoryContract
{
    public function __construct(Car $model)
    {
        parent::__construct($model);
    }

    public function findCar(int $id): Car|ModelNotFoundException
    {
        return $this->model->findOrFail($id);
    }

    public function allCars(): Collection
    {
        return $this->model->get();
    }

    public function update(array $attributes): bool
    {
        return $this->model->update($attributes);
    }

    public function deleteCar(int $id): int
    {
        return $this->model->destroy($id);
    }
}

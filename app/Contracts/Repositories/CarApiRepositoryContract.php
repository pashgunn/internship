<?php

namespace App\Contracts\Repositories;

use App\Models\Car;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\ModelNotFoundException;

interface CarApiRepositoryContract
{
    public function allCars(): Collection;
    public function findCar(int $id): Car|ModelNotFoundException;
    public function update(array $attributes): bool;
    public function deleteCar(int $id): int;
}

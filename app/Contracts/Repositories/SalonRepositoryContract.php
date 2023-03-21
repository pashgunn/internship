<?php

namespace App\Contracts\Repositories;

interface SalonRepositoryContract
{
    public function allSalons(): array;
    public function randomSalons(array $params): array;
}

<?php

namespace App\Contracts\Repositories;

use Illuminate\Database\Eloquent\Collection;

interface CarRepositoryContract
{
    public function homepageCars(int $paginatesCount): Collection;
    public function forClients(): Collection;
}

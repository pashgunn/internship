<?php

namespace App\Contracts\Repositories;

use Illuminate\Database\Eloquent\Collection;

interface CarRepositoryContract
{
    public function homepageCars(): Collection;
    public function forClients(): Collection;
}

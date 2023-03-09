<?php

namespace App\Contracts\Repositories;

use Illuminate\Support\Collection;

interface TagRepositoryContract
{
    public function existingTags(Collection $tags): Collection;
}

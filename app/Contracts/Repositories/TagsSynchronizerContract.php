<?php

namespace App\Contracts\Repositories;


use App\Contracts\HasTags;
use Illuminate\Support\Collection;

interface TagsSynchronizerContract
{
    public function sync(Collection $tags, HasTags $model): void;
}

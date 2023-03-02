<?php

namespace App\Contracts\Repositories;

use Illuminate\Support\Collection;

interface TagRepositoryContract
{
    public function get(): Collection;
    public function keyByTags(): Collection;
    public function contains(string $field, string $value): bool;
    public function syncIds(Collection $tags): array;
}

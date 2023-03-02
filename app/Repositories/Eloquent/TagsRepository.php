<?php

namespace App\Repositories\Eloquent;

use App\Contracts\Repositories\TagRepositoryContract;
use App\Models\Tag;
use Illuminate\Support\Collection;

class TagsRepository extends BaseRepository implements TagRepositoryContract
{
    public function __construct(Tag $model)
    {
        parent::__construct($model);
    }

    public function get(): Collection
    {
        return $this->model->get();
    }

    public function keyByTags(): Collection
    {
        return $this->get()->keyBy('name');
    }

    public function contains(string $field, string $value): bool
    {
        return $this->get()->contains($field, $value);
    }

    public function syncIds(Collection $tags): array
    {
        return $this->model->keyByTags()->intersectByKeys($tags)->pluck('id')->toArray();
    }
}

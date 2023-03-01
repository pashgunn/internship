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

    public function keyByTags(): Collection
    {
        return $this->model->get()->keyBy('name');
    }
}

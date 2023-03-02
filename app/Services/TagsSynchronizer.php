<?php

namespace App\Services;

use App\Contracts\HasTags;
use App\Contracts\Repositories\TagRepositoryContract;
use App\Contracts\Repositories\TagsSynchronizerContract;
use Illuminate\Support\Collection;

class TagsSynchronizer implements TagsSynchronizerContract
{
    public function __construct(
        private readonly TagRepositoryContract     $tagRepository
    ) {
    }

    public function sync(Collection $tags, HasTags $model): void
    {
        $tags->each(function ($tag) use ($model) {
            if(!$this->tagRepository->contains('name', $tag)) {
                $model->tags()->create(
                    ['name' => $tag]
                );
            }
        });
        $syncIds = $this->tagRepository->syncIds($tags);
        $model->tags()->sync($syncIds);
    }
}

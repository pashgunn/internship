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
        $allTags = $this->tagRepository->keyByTags();
        $nonexistentTags = $tags->diffKeys($allTags);
        if (!empty($nonexistentTags)) {
            foreach ($nonexistentTags->keys() as $nonexistentTag) {
                $model->tags()->create(
                    ['name' => $nonexistentTag]
                );
            }
            $allTags = $this->tagRepository->keyByTags();
        }
        $syncIds = $allTags->intersectByKeys($tags)->pluck('id')->toArray();
        $model->tags()->sync($syncIds);
    }
}

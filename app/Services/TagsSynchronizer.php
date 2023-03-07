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
        // Get existing tags and create new ones
        $existingTags = $this->tagRepository->existingTags($tags);
        $newTagNames = $tags->diff($existingTags->pluck('name'));
        $newTags = $newTagNames->map(function ($tagName) {
            return $this->tagRepository->create(['name' => $tagName]);
        });

        // Associate all tags with the model
        $allTags = $existingTags->merge($newTags);
        $model->tags()->sync($allTags->pluck('id'));
    }
}

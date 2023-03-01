<?php

namespace App\Services;

use App\Contracts\HasTags;
use App\Models\Tag;
use Illuminate\Support\Collection;

class TagsSynchronizer
{
    public function sync(Collection $tags, HasTags $model)
    {
        $allTags = Tag::get()->keyBy('name');
        $nonexistentTags = $tags->diffKeys($allTags);
        if (!empty($nonexistentTags)) {
            foreach ($nonexistentTags->keys() as $nonexistentTag) {
                $model->tags()->create(
                    ['name' => $nonexistentTag]
                );
            }
            $allTags = Tag::get()->keyBy('name');
        }
        $syncIds = $allTags->intersectByKeys($tags)->pluck('id')->toArray();
        $model->tags()->sync($syncIds);
    }
}

<?php

namespace App\Repositories\Eloquent;

use App\Contracts\Repositories\ImageRepositoryContract;
use App\Models\Image;

class ImageRepository extends BaseRepository implements ImageRepositoryContract
{
    public function __construct(Image $model)
    {
        parent::__construct($model);
    }
}

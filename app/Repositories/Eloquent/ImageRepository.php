<?php

namespace App\Repositories\Eloquent;

use App\Contracts\Repositories\ImageRepositoryContract;
use App\Models\Image;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Cache;

class ImageRepository extends BaseRepository implements ImageRepositoryContract
{
    public function __construct(Image $model)
    {
        parent::__construct($model);
    }

    public function imageCreate(UploadedFile $file): Image
    {
        $path = $file->store('images', ['disk' => 'public']);
        $image = $this->create(['path' => $path]);

        //delete cache for images
        Cache::tags(['images'])->flush();

        return $image;
    }
}

<?php

namespace App\Repositories\Eloquent;

use App\Contracts\Repositories\ImageRepositoryContract;
use App\Models\Image;
use Illuminate\Http\UploadedFile;

class ImageRepository extends BaseRepository implements ImageRepositoryContract
{
    public function __construct(Image $model)
    {
        parent::__construct($model);
    }

    public function imageCreate(UploadedFile $file): Image
    {
        $path = $file->store('images', ['disk' => 'public']);
        return $this->create(['path' => $path]);
    }
}

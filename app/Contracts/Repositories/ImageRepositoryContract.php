<?php

namespace App\Contracts\Repositories;

use App\Models\Image;
use Illuminate\Http\UploadedFile;

interface ImageRepositoryContract
{
    public function imageCreate(UploadedFile $file): Image;
}

<?php

namespace App\Contracts\Repositories;

use App\Models\Image;
use Illuminate\Http\UploadedFile;

interface ImageSaverContract
{
    public function save(UploadedFile $file): Image;
}

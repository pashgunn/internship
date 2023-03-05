<?php

namespace App\Services;

use App\Contracts\Repositories\ImageSaverContract;
use App\Models\Image;
use Illuminate\Http\UploadedFile;

class ImageSaver implements ImageSaverContract
{
    public function save(UploadedFile $file): Image
    {
        $fileName = $file->getClientOriginalName();
        $file->storeAs('public', $fileName);
        return Image::create([
            'name' => 'storage/' . $fileName
        ]);
    }
}

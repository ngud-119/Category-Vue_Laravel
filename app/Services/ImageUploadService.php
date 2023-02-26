<?php

namespace App\Services;

use Illuminate\Http\UploadedFile;

class ImageUploadService
{
    public static function uploadImage(UploadedFile $file): string
    {
        $fileName = $file->getClientOriginalName();
        $file->move(public_path('images'), $fileName);
        return config('app.url') . '/images/' . $fileName;
    }
}

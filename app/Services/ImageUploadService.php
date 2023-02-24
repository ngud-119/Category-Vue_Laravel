<?php
namespace App\Services;

use Illuminate\Http\UploadedFile;

class ImageUploadService
{
    public static function uploadImage(UploadedFile $file)
    {
        $fileName = $file->getClientOriginalName(); 
        $file->move(public_path('images'), $fileName);
        $path = config('app.url').'/images/'.$fileName;
        return $path;
    }
    
}
<?php
namespace App\Services;

use Illuminate\Http\UploadedFile;

class ImageUploadService
{
    public static function uploadImage($file)
    {
        $fileName = $file->getClientOriginalName(); 
        $file->move(public_path('images'), $fileName);
        $path = 'http://localhost:8000/images/'.$fileName;
        return $path;
    }
    
}
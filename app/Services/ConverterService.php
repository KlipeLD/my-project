<?php

namespace App\Services;

use Illuminate\Support\Facades\File; 
use Buglinjo\LaravelWebp\Facades\Webp;

class ConverterService
{

    public function uploadedImage($image, $folderName): string
    {
        if (!is_null($image)) {
            $webp = Webp::make($image);
            $originalName = $image->getClientOriginalName();
            $filename = pathinfo($originalName, PATHINFO_FILENAME);
            $extension = pathinfo($originalName, PATHINFO_EXTENSION);
            $imgName = $folderName.'/'.$filename.'.webp';
            if ($webp->save(public_path('img/convertWebp/' . $imgName))) {
                return $imgName;
            }
            return '';
        }
    }

    public function deletedImage($image): void
    {
        $image = public_path('img/convertWebp/'.$image);
        if(File::exists($image)) 
        {
            File::delete($image);
        }
    }
}
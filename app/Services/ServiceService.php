<?php

namespace App\Services;

use App\Models\Service;
use Illuminate\Support\Facades\File; 

class ServiceService
{
    protected Service $service;

    public function __construct(Service $service)
    {
        $this->service = $service;
    }

    public function uploadedImage($image): string
    {
        if (!is_null($image)) {
            $imgName = time().'_'.rand().'.'.$image->extension();
            $image->move(public_path('img/services'), $imgName);
            return $imgName;
        }
    }

    public function deletedImage($image): void
    {
        $image = public_path('img/services/'.$image);
        if(File::exists($image)) 
        {
            File::delete($image);
        }
    }


}
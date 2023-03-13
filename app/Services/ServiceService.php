<?php

namespace App\Services;

use App\Models\Service;
use Illuminate\Support\Facades\File; 
use Buglinjo\LaravelWebp\Facades\Webp;

class ServiceService
{
    protected Service $service;

    public function __construct(Service $service)
    {
        $this->service = $service;
    }

    public function uploadedImage($image): string
    {
        // if (!is_null($image)) {
        //     $imgName = time().'_'.rand().'.'.$image->extension();
        //     $image->move(public_path('img/services'), $imgName);
        //     return $imgName;
        // }
        if (!is_null($image)) {
            $webp = Webp::make($image);
            $imgName = time().'_'.rand().'.webp';
            if ($webp->save(public_path('img/services/' . $imgName))) {
                return $imgName;
            }
            return '';
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
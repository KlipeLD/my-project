<?php

namespace App\Services;

use App\Models\Article;
use Illuminate\Support\Facades\File; 
use Buglinjo\LaravelWebp\Facades\Webp;

class ArticleService
{
    protected Article $article;

    public function __construct(Article $article)
    {
        $this->article = $article;
    }

    public function uploadedImage($image): string
    {
        // if (!is_null($image)) {
        //     $imgName = time().'_'.rand().'.'.$image->extension();
        //     $image->move(public_path('img/articles'), $imgName);
        //     return $imgName;
        // }
        if (!is_null($image)) {
            $webp = Webp::make($image);
            $imgName = time().'_'.rand().'.webp';
            if ($webp->save(public_path('img/articles/' . $imgName))) {
                return $imgName;
            }
            return '';
        }
    }

    public function deletedImage($image): void
    {
        $image = public_path('img/articles/'.$image);
        if(File::exists($image)) 
        {
            File::delete($image);
        }
    }

}
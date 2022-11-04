<?php

namespace App\Services;

use App\Models\Article;

class ArticleService
{
    protected Article $article;

    public function __construct(Article $article)
    {
        $this->article = $article;
    }

}
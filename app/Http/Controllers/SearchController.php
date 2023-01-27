<?php

namespace App\Http\Controllers;
// use App\Services\ArticleService;
use App\Models\Article;

use Illuminate\Http\Request;

class SearchController extends Controller
{

    protected $article;
    // protected $articleService;

    public function __construct(Article $article/*, ArticleService $articleService*/)
    {
        $this->article = $article;
        // $this->articleService = $articleService;
    }

    public function index(Request $request)
    {
        return view('article.index', ['articles' => $this->article->getSearchArticles()]);
    }
}

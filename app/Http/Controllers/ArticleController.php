<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\ArticleService;
use App\Models\Article;
use App\Http\Requests\Article\StoreRequest;
use App\Http\Requests\Article\UpdateRequest;
use App\Http\Requests\Article\DestroyRequest;

class ArticleController extends Controller
{
    protected $article;
    protected $articleService;

    public function __construct(Article $article, ArticleService $articleService)
    {
        $this->article = $article;
        $this->articleService = $articleService;
    }

    public function index()
    {
        return view('article.index', ['articles' => $this->article->getArticles()]);
    }
    
    public function create()
    {
        return view('article.create');
    }

    public function store(StoreRequest $request)
    {   
        $data = $request->validated();
        if($request->hasFile('img'))
        {
            $data['img'] = $this->articleService->uploadedImage($request->file('img'));
        }
        $article = $this->article->create($data);

        return redirect(route('article.index',['article' => $article->id]));
    }

    public function show(string $slug)
    {
        return view('article.show',['article' => $this->article->getArticleBySlugWithDecode($slug)]);
    }

    public function edit(string $slug)
    {
        return view('article.edit',[
            'article' => $this->article->getArticleBySlug($slug)
        ]);
    }

    public function update(Article $article, UpdateRequest $request)
    {
        $article->update(($request->except('img')));
        if($request->hasFile('img'))
        {
            $this->articleService->deletedImage($article->img);
            $article->img = $this->articleService->uploadedImage($request->file('img'));
            $article->save();
        }
      
        return redirect(route('article.show',['article' => $article]));
    }

    public function destroy(Article $article, DestroyRequest $request)
    {
        $this->articleService->deletedImage($article->img);
        $article->delete();

        return redirect(route('article.index'));
    }
}

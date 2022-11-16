<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\ArticleService;
use App\Models\Article;
use App\Http\Requests\Article\StoreRequest;
use App\Http\Requests\Article\UpdateRequest;
use Str;

class ArticleController extends Controller
{
    protected $article;
    protected $articleService;
    //TODO : ArticleService

    public function __construct(Article $article, ArticleService $articleService)
    {
        $this->article = $article;
        $this->articleService = $articleService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('article.index', ['articles' => $this->article->getArticles()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('article.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRequest $request)
    {
        //TODO: add image
        $article = $this->article->create($request->validated());

        return redirect(route('article.index',['article' => $article->id]));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(string $slug)
    {
        return view('article.show',['article' => $this->article->getArticleBySlug($slug)]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(string $slug)
    {
        return view('article.edit',[
            'article' => $this->article->getArticleBySlug($slug)
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Article $article, UpdateRequest $request)
    {
        $article->update($request->validated());
        //TODO: add image
        // $article = $this->article->create($request->validated());

        return redirect(route('article.show',['article' => $article]));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Article $article, DestroyRequest $request)
    {
        $article->delete();

        return redirect(route('article.index'));
    }
}

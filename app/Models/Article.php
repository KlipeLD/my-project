<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Str;

class Article extends Model
{
    use HasFactory;

    protected $fillable = [
        'title_en',
        'body_en',
        'title_pl',
        'body_pl',
        'title_ru',
        'body_ru',
        'img'
    ];

    public static function boot()
    {
        parent::boot();

        static::saving(function ($model) {
            $model->body_pl = $model->body_pl;
            $model->body_ru = $model->body_ru;
            $model->body_en = $model->body_en;
            $model->slug = Str::slug($model->title_en);
        });
    }

    public function getRouteKeyName(): string
    {
        return 'slug';
    }

    public function getArticles(): Collection
    {
        return $this->whereRAW('deleted_at IS NULL')->get();
        //TODO: comments
    }

    public function getSearchArticles() : Collection
    {
        return $this->whereRAW('deleted_at IS NULL')->get();
    }

    public function getArticleBySlugWithDecode($slug): Article
    {
        $article = $this->where('slug', $slug)->firstorfail();
        return $this->decodeHtmlInBody($article);
    }

    public function getArticleBySlug($slug): Article
    {
        $article = $this->where('slug', $slug)->firstorfail();
        return $article;
    }

    protected function decodeHtmlInBody(Article $article) : Article
    {
        // $article->body_pl = htmlspecialchars_decode($article->body_pl);
        // $article->body_en = htmlspecialchars_decode($article->body_en);
        // $article->body_ru = htmlspecialchars_decode($article->body_ru);
        $article->body_ru = str_replace('   ','&nbsp;&nbsp;&nbsp;&nbsp;',$article->body_ru);
        $article->body_en = str_replace('   ','&nbsp;&nbsp;&nbsp;&nbsp;',$article->body_en);
        $article->body_pl = str_replace('   ','&nbsp;&nbsp;&nbsp;&nbsp;',$article->body_pl);
        // $article->body_ru = str_replace('<','&lt;',$article->body_ru);
        // $article->body_en = str_replace('<','&lt;',$article->body_en);
        // $article->body_pl = str_replace('<','&lt;',$article->body_pl);
        $article->body_ru = str_replace('[code]','<div class="code">',$article->body_ru);
        $article->body_en = str_replace('[code]','<div class="code">',$article->body_en);
        $article->body_pl = str_replace('[code]','<div class="code">',$article->body_pl);
        $article->body_ru = str_replace('[.code]','</div>',$article->body_ru);
        $article->body_en = str_replace('[.code]','</div>',$article->body_en);
        $article->body_pl = str_replace('[.code]','</div>',$article->body_pl);
        $patterns = array(
            "/\[link\](.*?)\[\/link\]/",
            "/\[url\](.*?)\[\/url\]/",
            "/\[img\](.*?)\[\/img\]/",
            "/\[b\](.*?)\[\/b\]/",
            "/\[u\](.*?)\[\/u\]/",
            "/\[i\](.*?)\[\/i\]/"
        );
        $replacements = array(
            "<a target='_blank' class='linkColorRed' href=\"\\1\">\\1</a>",
            "<a class='linkColorRed' href=\"\\1\">\\1</a>",
            "<img src=\"\\1\">",
            "<b>\\1</b>",
            "<u>\\1</u>",
            "<i>\\1</i>"
           
        );
        $article->body_ru = preg_replace($patterns,$replacements, $article->body_ru);
        $article->body_en = preg_replace($patterns,$replacements, $article->body_en);
        $article->body_pl = preg_replace($patterns,$replacements, $article->body_pl);
        return $article;
    }
}

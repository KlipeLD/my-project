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

    public function getArticleBySlug($slug): Article
    {
        return $this->where('slug',$slug)->firstorfail();
    }
}

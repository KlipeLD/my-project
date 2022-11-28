<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Str;

class Service extends Model
{
    use HasFactory;

    protected $fillable = [
        'title_en',
        'title_ru',
        'title_pl',
        'url',
        'img'
    ];

    public function getRouteKeyName(): string
    {
        return 'url';
    }

    public function getServices(): Collection
    {
        return $this->whereRAW('deleted_at IS NULL')->get();
    }

    public function getServiceByUrl($url): Service
    {
        return $this->where('url',$url)->firstorfail();
    }
}

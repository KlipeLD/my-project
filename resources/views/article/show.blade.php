@extends ('layouts.layout')

@section ('head')

@endsection

@section ('content')
<div class="container">
    <div class="row">
        <div class="col">
            <h1>
                @if(App::isLocale('ru'))
                    {{ $article->title_ru }}
                @elseif(App::isLocale('en'))
                    {{ $article->title_en }}
                @else
                    {{ $article->title_pl }}
                @endif
            </h1>
        </div>
    </div>
    @if(Auth::check())
    <div class="row">
        <div class="col">
            <a href="{{ route('article.edit', ['article' => $article->slug]) }}" class="btn btn-danger" type="button">
                {{ __('messages.edit') }}
            </a>
        </div>
    </div>
    @endif
    <div class="row">
        <div class="col-md-8 mt-3">
            <div class="row">
                <div class="col">
                    @if(!empty($article->img))
                        <img data-bs-idik="{{ $article->id }}" class="imgArticleInShow" src="{{ asset('/img/articles/'.$article->img) }}" onerror="this.src='/img/noimg3.jpg';">
                    @else
                        <img class="imgArticleInShow" src="{{ asset('/img/noimg3.jpg') }}">
                    @endif
                </div>
            </div>
            <div class="row mt-3">
                <div class="col">
                    @if(App::isLocale('ru'))
                        {!! $article->body_ru !!}
                    @elseif(App::isLocale('en'))
                        {!! $article->body_en !!}
                    @else
                        {!! $article->body_pl !!}
                    @endif
                </div>
            </div>
        </div>
    </div>
    
</div>
@endsection

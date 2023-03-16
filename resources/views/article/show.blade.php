@extends ('layouts.layout')

@section ('head')
    <title>
        {{ __('messages.nav_blog') }} - 
        @if(App::isLocale('ru'))
            {{ $article->title_ru }}
        @elseif(App::isLocale('en'))
            {{ $article->title_en }}
        @else
            {{ $article->title_pl }}
        @endif
    </title>
    <meta name="description" content="
        @if(App::isLocale('ru'))
            {{ $article->title_ru }}
        @elseif(App::isLocale('en'))
            {{ $article->title_en }}
        @else
            {{ $article->title_pl }}
        @endif
        {{ __('messages.nav_blog') }} - {{ __('messages.page_name') }}"
    />
    <link rel="canonical" href="{{ route('article.show',['article' => $article->slug]) }}">
@endsection

@section ('content')
<div class="container mb-5">
    <div class="row">
        <div class="col-md-8 four divCenter">
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
        <div class="col">
            <form action="{{ route('article.destroy', ['article' => $article->slug]) }}" method="post">
                <input name="_method" type="hidden" value="DELETE">
                @csrf

                <button class="btn btn-danger" type="submit">
                    {{ __('messages.delete') }}
                </button>
            </form>
        </div>
    </div>
    @endif
    <div class="row">
        <div class="col-md-8 mt-3 ">
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
                    <div class="articleBody">
                        @if(App::isLocale('ru'))
                            {!! nl2br($article->body_ru) !!}
                        @elseif(App::isLocale('en'))
                            {!! nl2br($article->body_en) !!}
                        @else
                            {!! nl2br($article->body_pl) !!}
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

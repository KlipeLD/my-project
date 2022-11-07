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
@endsection

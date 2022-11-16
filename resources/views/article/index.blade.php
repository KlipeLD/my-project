@extends ('layouts.layout')

@section ('head')
    
@endsection

@section ('content')
<div class="container mt-5">
    @if(Auth::check())
        <div class="row mb-5">
            <div class="col">
                <a href="{{ route('article.create') }}" class="btn btn-danger" type="button">
                    {{ __('messages.create') }}
                </a>
            </div>
        </div>
    @endif
    <div class="row">
        @forelse($articles as $article)
        <div class="col-md-4 mb-5">                        
            <div class="articleInBlog">
                <a target="_blank" class="articleLink" href="{{ route('article.show',['article' => $article->slug]) }}">
                    @if(!empty($article->img))
                        <img data-bs-idik="{{ $article->id }}" class="imgArticle" src="{{ asset('/img/'.$article->img) }}" onerror="this.src='/img/products/noimg3.jpg';">
                    @else
                        <img class="imgArticle" src="{{ asset('/img/noimg3.jpg') }}">
                    @endif
                </a>
                <div class="articleTitle mt-3">
                    @if(App::isLocale('ru'))
                        {{ $article->title_ru }}
                    @elseif(App::isLocale('en'))
                        {{ $article->title_en }}
                    @else
                        {{ $article->title_pl }}
                    @endif
                </div>
            </div>    
        </div>
        @empty

        @endforelse
    </div>
</div>
@endsection
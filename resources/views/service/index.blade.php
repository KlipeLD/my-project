@extends ('layouts.layout')

@section ('head')
    <title>{{ __('messages.nav_services') }} - {{ __('messages.page_name') }}</title>
    <meta name="description" content="{{ __('messages.nav_services') }} - {{ __('messages.page_name') }}"/>
    <link rel="canonical" href="{{ route('service.index') }}">
@endsection

@section ('content')
<div class="container mt-5">
    <div class="container-fluid mb-2 divCenter">
        <div class="row">
            <div class="col-md-12 four justify-content-center">
                <h1>{{ __('messages.nav_services') }}</h1>
            </div>
        </div>
    </div>
    @if(Auth::check())
        <div class="row mb-5">
            <div class="col">
                <a href="{{ route('service.create') }}" class="btn btn-danger" type="button">
                    {{ __('messages.create') }}
                </a>
            </div>
        </div>
    @endif
    <div class="row">
        @forelse($services as $service)
        <div class="col-md-4 mb-5">                        
            <div class="articleInBlog">
                <a target="_blank" class="articleLink" href="{{ '/'.$service->url }}">
                    @if(!empty($service->img))
                        <img data-bs-idik="{{ $service->id }}" class="imgArticle" src="{{ asset('/img/services/'.$service->img) }}" onerror="this.src='/img/noimg3.jpg';">
                    @else
                        <img class="imgArticle" src="{{ asset('/img/noimg3.jpg') }}">
                    @endif
                </a>
                <div class="articleTitle mt-3">
                    @if(App::isLocale('ru'))
                        {{ $service->title_ru }}
                    @elseif(App::isLocale('en'))
                        {{ $service->title_en }}
                    @else
                        {{ $service->title_pl }}
                    @endif
                    @if(Auth::check())
                        <br>
                        <a href="{{ route('service.edit', ['service' => $service->url]) }}" class="btn btn-danger mt-3" type="button">
                            {{ __('messages.edit') }}
                        </a>
                        <form action="{{ route('service.destroy', ['service' => $service->url]) }}" method="post">
                            <input name="_method" type="hidden" value="DELETE">
                            @csrf
                            <button class="btn btn-danger mt-3" type="submit">
                                {{ __('messages.delete') }}
                            </button>
                        </form>
                    @endif
                </div>
            </div>    
        </div>
        @empty

        @endforelse
    </div>
</div>
@endsection
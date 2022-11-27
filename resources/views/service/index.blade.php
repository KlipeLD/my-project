@extends ('layouts.layout')

@section ('head')
    
@endsection

@section ('content')
<div class="container mt-5">
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
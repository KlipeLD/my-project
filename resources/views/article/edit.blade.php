@extends ('layouts.layout')

@section ('head')
    
@endsection

@section ('content')
<div class="container-fluid">
        <div class="marginTopFromMenu">
            <div class="row justify-content-center">
                <div class="col-12">
                    <div class="container mt-3">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-md-12p">
                                    @if(Session::has('textOnTop'))
                                        {!! Session::get('textOnTop') !!}
                                    @endif
                                    <div class="card mb-5">
                                        <div class="card-header">{{ __('messages.nav_blog') . ' - ' . __('messages.creating') }}</div>

                                        <div class="card-body">
                                            <form method="POST" action="{{ route('article.update', ['article' => $article->slug]) }}" enctype="multipart/form-data">
                                                @csrf
                                                @method('put')
                                                <div class="form-group row mt-3">
                                                    <label for="title_en"
                                                           class="col-md-3 col-form-label text-md-right">{{ __('messages.title') }} (EN)</label>

                                                    <div class="col-md-8">
                                                        <input id="title_en" type="text"
                                                               class="form-control boxShadNone @error('title_en') is-invalid @enderror"
                                                               name="title_en" value="{{ $article->title_en }}" autocomplete="off"
                                                               autofocus>

                                                        @error('title_en')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="form-group row mt-3">
                                                    <label for="body_en"
                                                           class="col-md-3 col-form-label text-md-right">{{ __('messages.body') }} (EN)</label>

                                                    <div class="col-md-8">
                                                        <textarea id="body_en" type="text" rows="14" 
                                                                  class="form-control boxShadNone @error('body_en') is-invalid @enderror"
                                                                  name="body_en"
                                                        >{!! htmlspecialchars($article->body_en) !!}</textarea>

                                                        @error('body_en')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="form-group row mt-3">
                                                    <label for="title_pl"
                                                           class="col-md-3 col-form-label text-md-right">{{ __('messages.title') }} (PL)</label>

                                                    <div class="col-md-8">
                                                        <input id="title_pl" type="text"
                                                               class="form-control boxShadNone @error('title_pl') is-invalid @enderror"
                                                               name="title_pl" value="{{ $article->title_pl }}" autocomplete="off"
                                                        >

                                                        @error('title_pl')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="form-group row mt-3">
                                                    <label for="body_pl"
                                                           class="col-md-3 col-form-label text-md-right">{{ __('messages.body') }} (PL)</label>

                                                    <div class="col-md-8">
                                                        <textarea id="body_pl" type="text" rows="14" 
                                                                  class="form-control boxShadNone @error('body_pl') is-invalid @enderror"
                                                                  name="body_pl"
                                                        >{!! htmlspecialchars($article->body_pl) !!}</textarea>

                                                        @error('body_pl')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="form-group row mt-3">
                                                    <label for="title_ru"
                                                           class="col-md-3 col-form-label text-md-right">{{ __('messages.title') }} (RU)</label>

                                                    <div class="col-md-8">
                                                        <input id="title_ru" type="text"
                                                               class="form-control boxShadNone @error('title_ru') is-invalid @enderror"
                                                               name="title_ru" value="{{ $article->title_ru }}" autocomplete="off"
                                                        >

                                                        @error('title_ru')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="form-group row mt-3">
                                                    <label for="body_ru"
                                                           class="col-md-3 col-form-label text-md-right">{{ __('messages.body') }} (RU)</label>

                                                    <div class="col-md-8">
                                                        <textarea id="body_ru" type="text" rows="14" 
                                                                  class="form-control boxShadNone @error('body_ru') is-invalid @enderror"
                                                                  name="body_ru"
                                                        >{!! htmlspecialchars($article->body_ru) !!}</textarea>

                                                        @error('body_ru')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                
                                                <div class="row mt-3">
                                                    <div class="col-md-3">
                                                    </div>
                                                    <div class="col-md-8 divArticleEdit">
                                                        @if(!empty($article->img))
                                                            <img data-bs-idik="{{ $article->id }}" class="imgArticleInEdit" src="{{ asset('/img/articles/'.$article->img) }}" onerror="this.src='/img/noimg3.jpg';">
                                                        @else
                                                            <img class="imgArticleInEdit" src="{{ asset('/img/noimg3.jpg') }}">
                                                        @endif
                                                    </div>
                                                </div>

                                                <div class="form-group row mt-3">
                                                    <label for="img"
                                                           class="col-md-3 col-form-label text-md-right">{{ __('messages.image') }}</label>
                                                    
                                                    <div class="col-md-8">
                                                        <input type="file" name="img" accept="image/*" class=" form-control @error('img') is-invalid @enderror" value="{{ old('img') }}">
                                                        
                                                        @error('img')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="form-group row mb-0 mt-3">
                                                    <div class="col-md-6 offset-md-3">
                                                        <button
                                                                type="submit" class="btn btn-danger g-recaptcha">
                                                            {{ __('messages.update') }}
                                                        </button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
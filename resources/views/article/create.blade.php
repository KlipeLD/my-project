@extends ('layouts.layout')

@section ('head')
    
@endsection

@section ('content')
<div class="container-fluid">
        <div class="marginTopFromMenu">
            <div class="row justify-content-center">
                <div class="col-12 mt-5 ">
                    <div class="container mt-3">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-md-12p">
                                    @if(Session::has('textOnTop'))
                                        {!! Session::get('textOnTop') !!}
                                    @endif
                                    <div class="card">
                                        <div class="card-header">{{ __('messages.nav_blog') . ' - ' . __('messages.creating') }}</div>

                                        <div class="card-body">
                                            <form method="POST" action="{{ route('article.store') }}" enctype="multipart/form-data">
                                                @csrf

                                                <div class="form-group row mt-3">
                                                    <label for="title_en"
                                                           class="col-md-3 col-form-label text-md-right">{{ __('messages.title') }} (EN)</label>

                                                    <div class="col-md-8">
                                                        <input id="title_en" type="text"
                                                               class="form-control boxShadNone @error('title_en') is-invalid @enderror"
                                                               name="title_en" value="{{ old('title_en') }}" autocomplete="off"
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
                                                        <textarea id="body_en" type="text"
                                                                  class="form-control boxShadNone @error('body_en') is-invalid @enderror"
                                                                  name="body_en"
                                                        >{!! htmlspecialchars(old('body_en')) !!}</textarea>

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
                                                               name="title_pl" value="{{ old('title_pl') }}" autocomplete="off"
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
                                                        <textarea id="body_pl" type="text"
                                                                  class="form-control boxShadNone @error('body_pl') is-invalid @enderror"
                                                                  name="body_pl"
                                                        >{!! htmlspecialchars(old('body_pl')) !!}</textarea>

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
                                                               name="title_ru" value="{{ old('title_ru') }}" autocomplete="off"
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
                                                        <textarea id="body_ru" type="text"
                                                                  class="form-control boxShadNone @error('body_ru') is-invalid @enderror"
                                                                  name="body_ru"
                                                        >{!! htmlspecialchars(old('body_ru')) !!}</textarea>

                                                        @error('body_ru')
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
                                                            {{ __('messages.add') }}
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
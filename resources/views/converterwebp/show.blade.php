@extends ('layouts.layout')

@section ('head')
    <title>
        {{ __('messages.converter_header') }} - {{ __('messages.page_name') }}
    </title>
    <meta name="description" content="{{ __('messages.converter_header') }} - {{ __('messages.page_name') }}"
    />
    <link rel="canonical" href="{{ route('converterwebp.show') }}">
@endsection

@section ('content')
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <h1>{{ __('messages.converter_header') }}</h1>
            </div>  
        </div>
        <div class="row">
            <div class="col">
                <div>{{ __('messages.converter_info') }}</div>
            </div>  
        </div>
        <div class="row">
            <div class="col-md-6">
                <form method="POST" action="{{ route('converterwebp.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group row mt-3">
                        <label for="img"
                               class="col-md-3 col-form-label text-md-right">{{ __('messages.image') }}</label>
                        
                        <div class="col-md-8">
                            <input type="file" name="img[]" multiple accept="image/*" class=" form-control @error('img') is-invalid @enderror" value="{{ old('img') }}">
                            
                            @error('img')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="form-group row mb-0 mt-3">
                            <div class="col-md-6 offset-md-3">
                                <button
                                        type="submit" class="btn btn-danger g-recaptcha">
                                    {{ __('messages.add') }}
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>  
        </div>
    </div>
@endsection
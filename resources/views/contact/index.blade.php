@extends ('layouts.layout')

@section ('head')
    <title>{{ __('messages.nav_contact_form') }} - {{ __('messages.page_name') }}</title>
    <meta name="description" content="{{ __('messages.nav_contact_form') }} - {{ __('messages.page_name') }}"/>
    <link rel="canonical" href="{{ route('contact.index') }}">
    <script src='https://www.google.com/recaptcha/api.js'></script>
@endsection

@section ('content')
    <div class="container-fluid">
        <div class="container-fluid mb-2 divCenter">
            <div class="row">
                <div class="col-md-12 four justify-content-center">
                    <h1>{{ __('messages.nav_contact_form') }}</h1>
                </div>
            </div>
        </div>
        <div class="marginTopFromMenu">
            <div class="row justify-content-center">
                <div class="col-12 mt-5 ">
                    <div class="container mt-3">

                        <div class="row">
                            <div class="col-md-8 mt-3">
                                {!! trans('messages.contact_text') !!}
                            </div>
                        </div>
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-md-12p">
                                    @if(Session::has('textOnTop'))
                                        {!! Session::get('textOnTop') !!}
                                    @endif
                                    <div class="card">
                                        <div class="card-header">{{ __('messages.contact_form') }}</div>

                                        <div class="card-body">
                                            <form method="POST" action="{{ route('contact.store') }}" enctype="multipart/form-data">
                                                @csrf

                                                <div class="form-group row mt-3">
                                                    <label for="company"
                                                           class="col-md-3 col-form-label text-md-right">{{ __('messages.contact_company') }}</label>

                                                    <div class="col-md-8">
                                                        <input id="company" type="text"
                                                               class="form-control boxShadNone @error('company') is-invalid @enderror"
                                                               name="company" value="{{ old('company') }}" autocomplete="company"
                                                               autofocus>

                                                        @error('company')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="form-group row mt-3">
                                                    <label for="name"
                                                           class="col-md-3 col-form-label text-md-right">{{ __('messages.contact_name') }}</label>

                                                    <div class="col-md-8">
                                                        <input id="name" type="text"
                                                               class="form-control boxShadNone @error('name') is-invalid @enderror"
                                                               name="name" value="{{ old('name') }}"  autocomplete="name"
                                                        >

                                                        @error('name')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="form-group row mt-3">
                                                    <label for="email"
                                                           class="col-md-3 col-form-label text-md-right">{{ __('messages.contact_email') }}</label>

                                                    <div class="col-md-8">
                                                        <input id="email" type="email"
                                                               class="form-control boxShadNone @error('email') is-invalid @enderror"
                                                               name="email" value="{{ old('email') }}"  autocomplete="email"
                                                        >

                                                        @error('email')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="form-group row mt-3">
                                                    <label for="phone"
                                                           class="col-md-3 col-form-label text-md-right">{{ __('messages.contact_phone') }}</label>

                                                    <div class="col-md-8">
                                                        <input id="phone" type="text"
                                                               class="form-control boxShadNone @error('phone') is-invalid @enderror"
                                                               name="phone" value="{{ old('phone') }}"  autocomplete="phone"
                                                        >

                                                        @error('phone')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="form-group row mt-3">
                                                    <label for="city"
                                                           class="col-md-3 col-form-label text-md-right">{{ __('messages.contact_city') }}</label>

                                                    <div class="col-md-8">
                                                        <input id="city" type="text"
                                                               class="form-control boxShadNone @error('city') is-invalid @enderror"
                                                               name="city" value="{{ old('city') }}" autocomplete="city"
                                                        >

                                                        @error('city')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="form-group row mt-3">
                                                    <label for="description"
                                                           class="col-md-3 col-form-label text-md-right">{{ __('messages.contact_description') }}</label>

                                                    <div class="col-md-8">
                                                        <textarea id="description" type="number"
                                                                  class="form-control boxShadNone @error('description') is-invalid @enderror"
                                                                  name="description"
                                                        >{!! htmlspecialchars(old('description')) !!}</textarea>

                                                        @error('description')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="form-group row mt-3">
                                                    <label class="col-md-3">

                                                    </label>
                                                    <div class="col-md-8">
                                                    </div>
                                                </div>
                                                <div class="form-group row mt-3">
                                                    <label class="col-md-3">

                                                    </label>
                                                    <div class="col-md-8">
                                                        <div name="count_check" id="count_check" class="g-recaptcha"
                                                             data-sitekey="6LfXKAwhAAAAAJiuuEC6wfU_53TJ0LYbgFe4KiZm"></div>

                                                        @error('g-recaptcha-response')
                                                          <span  class="text-danger" role="alert">
                                                              <strong>{{ $message }}</strong>
                                                          </span>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="form-group row mt-3">
                                                    <label class="col-md-3">

                                                    </label>
                                                    <div class="col-md-8">
                                                    </div>
                                                </div>
                                                <div class="form-group row mt-3">
                                                    <label class="col-md-3">

                                                    </label>
                                                    <div class="col-md-8">
                                                        <i class="far fa-check-square"></i> {{ __('messages.contact_accept') }}
                                                    </div>
                                                </div>

                                                <div class="form-group row mb-0 mt-3">
                                                    <div class="col-md-6 offset-md-3">
                                                        <button
                                                                type="submit" class="btn btn-danger g-recaptcha">
                                                            {{ __('messages.contact_send') }}
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
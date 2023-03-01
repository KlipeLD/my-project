@extends ('layouts.layout')

@section('head')
  <title>{{ __('messages.page_name') }}</title>
  <meta name="description" content="Cookie {{ __('messages.page_name') }}"/>
  <link rel="canonical" href="{{ route('cookies.index') }}">
  <script src="{{ asset('/js/cookieOpen.js') }}"></script>
@endsection

@section ('content')
  <div class="container-fluid">
    <div class="marginTopFromMenu">
      <div class="row justify-content-center">
        <div class="col-10 mt-5 productRightMain">
          <div class="container mt-3">
            <h2>
              {{ __('cookies.header') }}
            </h2>
            <div class="row">
              <div class="col-md-8 mt-5">
                {!! trans('cookies.text') !!}
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
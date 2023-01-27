@extends ('layouts.layout')

@section ('head')
    <title>
        {{ __('messages.barcode_header') }} - {{ __('messages.page_name') }}
    </title>
    <meta name="description" content="{{ __('messages.barcode_header') }} - {{ __('messages.page_name') }}"
    />
    <link rel="canonical" href="{{ route('barcode.code128.show',['text'=> $clear_text]) }}">
@endsection

@section ('content')
<div class="container">
    <div class="row">
        {!! __('messages.barcode_show_text') !!}
        <form action="{{ route('barcode.code128.show') }}" method="post">
            <div class="form-group mt-5">
                @csrf
                <label for="text">{{ __('messages.barcode_label_input') }}</label>
                <input type="text" class="form-control" name="text" value="{{ $clear_text }}">
            </div>
            <button class="btn btn-danger mt-3 mb-3" type="submit" name="submit" class="btn-link">{{ __('messages.barcode_button_enter')}}</button>
        </form>
    </div>
    <hr>
    <div class="row mb-3">
        <div class="col">
            {{ __('messages.barcode_output') }}
            <span class="barcode_clear_text">
                {{ $clear_text }}
            </span>
        </div>
    </div>
    <div class="barcode_body row">
        <div class="col">
            <div style='color: black; font-family: code128;font-size: 70px'>{{ $barcode }}</div>
        </div>
    </div>
</div>
@endsection
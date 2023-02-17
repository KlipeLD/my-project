@extends ('layouts.layout')

@section ('head')
    <title>
        {{ __('messages.barcode_header') }} - {{ __('messages.page_name') }}
    </title>
    <meta name="description" content="{{ __('messages.barcode_header') }} - {{ __('messages.page_name') }}"
    />
    <link rel="canonical" href="{{ route('barcode.code128.index') }}">
@endsection

@section ('content')
<div class="container">
    <div class="row">
        {!! __('messages.barcode_index_text') !!}
        <form action="{{ route('barcode.code128.show') }}" method="post">
            @csrf
            <input type="text" hidden class="form-input" name="text" value="Hello world :)">
            <button class="btn btn-danger mt-3 mb-3" type="submit" name="submit" >{{ __('messages.barcode_button')}}</button>
        </form>
    </div>
    <div class="barcode_body row">
        <div class="col">
            <div style='color: black; font-family: code128;font-size: 70px'>{{ $barcode }}</div>
        </div>
    </div>
    <hr class="mt-5">
    <div class="row">
        <div class="col">
            {!! __('messages.barcode_show_text2') !!}
        </div>
    </div>
</div>
@endsection
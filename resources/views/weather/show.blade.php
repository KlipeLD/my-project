@extends ('layouts.layout')

@section ('head')

@endsection

@section ('content')
    <div class="container">
        <div class="row">
            <div class="col">
                <h1>{{ __('messages.weather_header') }}</h1>
            </div>  
        </div>
        <div class="row">
            <div class="col">
                <div>{{ __('messages.weather_info') }}</div>
            </div>  
        </div>
        <div class="row">
            <div class="col-md-2">
                <img src="{{ $weather->icon}}" alt="{{ __('messages.weather_img_alt') }}">
            </div>
            <div class="col-md-4">
                {{ $weather->city }} ({{ $weather->country }})<br>
                {{ $weather->temperature }}<br>
                {{ $weather->description }}
            </div>  
        </div>
    </div>
@endsection
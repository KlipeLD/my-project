<?php

namespace App\Services;

use Illuminate\Support\Facades\App;
use Illuminate\Support\Collection;
use stdClass;

class WeatherService
{
    public function getWeather(int $id): Collection
    {
        $response_data = $this->getDataFromUrl();
        $weather = $this->getWeatherDataFromResponse($response_data);
        return $weather;
    }

    protected function getDataFromUrl(): stdClass 
    {
        $api_url = 'https://api.openweathermap.org/data/2.5/weather?lat=53.1183253&lon=23.149713&lang='.
            App::currentLocale().'&units=metric&appid='.config('private_app.api_weather');
        $json_data = file_get_contents($api_url);
        $response_data = json_decode($json_data);
        return $response_data;
    }

    protected function getWeatherDataFromResponse(stdClass $response_data) : Collection
    {
        $weather = new Collection();
        $weather->city = $response_data->name;
        $weather->country = $response_data->sys->country;
        $weather->temperature = $response_data->main->temp . ' °C';
        $weather->description = $response_data->weather[0]->description;
        $weather->icon = 'http://openweathermap.org/img/wn/'.$response_data->weather[0]->icon.'@2x.png';
        return $weather;
    }
}
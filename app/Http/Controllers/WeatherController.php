<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\WeatherService;


class WeatherController extends Controller
{
    protected $weatherService;

    public function __construct(WeatherService $weatherService)
    {
        $this->weatherService = $weatherService;
    }

    public function show(int $id = 0)
    {   
        return view('weather.show',[ 'weather' => $this->weatherService->getWeather($id)]);
    }
}

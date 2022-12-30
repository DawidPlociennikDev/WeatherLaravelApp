<?php

namespace App\Http\Controllers;

use App\Http\Requests\CityRequest;
use App\Services\WeatherAPI;

class WeatherController extends Controller
{
    public function weatherForCity(CityRequest $request, WeatherAPI $api)
    {
        echo $api->getWeather($request->city);
    }
}

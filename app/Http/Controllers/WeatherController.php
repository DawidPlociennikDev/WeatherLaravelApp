<?php

namespace App\Http\Controllers;

use App\Http\Requests\CityRequest;
use App\Services\WeatherAPI;
use Illuminate\Contracts\View\View;
use stdClass;

class WeatherController extends Controller
{
    public function weatherResult(CityRequest $request, WeatherAPI $api): View
    {
        $weather = json_decode($api->getWeather($request->city));
        $currentWeather = $weather->current_condition[0];
        return view('weather_result', compact(['currentWeather', 'weather']));
    }
}

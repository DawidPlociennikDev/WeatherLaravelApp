<?php

namespace Tests\Unit;
use Tests\TestCase;

use App\Services\WeatherAPI;

class WeatherApiTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */

    public function test_api_response_json() : void
    {
        $api = new WeatherAPI;
        $array = json_decode($api->getWeather('Legnica'), true);
        $this->assertIsArray($array);
    }

    public function test_artisan_command() : void
    {
        $this->artisan('weather:city', ['city' => 'Legnica'])->assertSuccessful();
    }


}

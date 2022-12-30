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
    public function test_api_response()
    {
        $api = new WeatherAPI;
        $api->getWeather('Legnica');
        $this->assertTrue(true);
    }

    public function test_api_resposne_with_wrong_param()
    {
        $api = new WeatherAPI;
        $api->getWeather('@@@22/');
        $this->assertTrue(true);
    }

    public function test_artisan_command()
    {
        $this->artisan('weather:city', ['city' => 'Legnica'])->assertSuccessful();
    }

    public function test_artisan_command_with_wrong_param()
    {
        $this->artisan('weather:city', ['city' => '@@@/@@2'])->assertExitCode(0);
    }
}

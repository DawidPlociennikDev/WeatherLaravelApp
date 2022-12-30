<?php

namespace App\Console\Commands;

use App\Services\WeatherAPI;
use Illuminate\Console\Command;

class WeatherForCity extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'weather:city {city}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Show weather for city {city}';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle(WeatherAPI $api)
    {
        echo $api->getWeather($this->argument('city'));
    }
}

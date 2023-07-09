<?php

namespace App\Console\Commands;

use App\Services\WeatherAPI;
use Illuminate\Console\Command;
use stdClass;

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
        if (!$this->argument('city')) return 0;
        $weather = json_decode($api->getWeather($this->argument('city')));
        $currentWeather = $weather->current_condition[0];

        $object = new stdClass;
        $object->currentTempC = $currentWeather->temp_C;
        $object->currentTempF = $currentWeather->temp_F;
        $object->datetime = $currentWeather->localObsDateTime;
        $object->humidity = $currentWeather->humidity;
        $object->pressure = $currentWeather->pressure;
        $object->weatherDesc = $currentWeather->weatherDesc[0]->value;

        echo response()->json($object);
    }
}

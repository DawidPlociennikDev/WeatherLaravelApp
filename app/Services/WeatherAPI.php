<?php

namespace App\Services;
use Illuminate\Support\Facades\Log;

class WeatherAPI
{
    protected $url;
    protected $client;

    public function __construct()
    {
        $this->url = 'https://wttr.in/';
        $this->client = new \GuzzleHttp\Client();
    }

    private function getResponse(string $city)
    {
        try {
            $this->url .= "$city?format=j1";
            $request = $this->client->request('GET', $this->url);

            $response = $request ? $request->getBody()->getContents() : null;
            $status = $request ? $request->getStatusCode() : 500;

            if ($response && $status === 200 && $response !== 'null') {
                return $response;
            }
            Log::error("No data available for localities $city");
            abort(404);
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            abort($e->getCode());
        }
    }

    public function getWeather(string $city)
    {
        return $this->getResponse($city);
    }
}

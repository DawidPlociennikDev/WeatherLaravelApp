<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ Request::get('city') }} - WatherApp</title>
    <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    @vite('resources/css/app.css')
</head>

<body>
    <div class="flex w-100 bg-slate-800 justify-center" style="min-height: 100vh">
        <div class="m-auto p-5 w-100">
            <div
                class="max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700 text-center m-auto">

                <h5 class="mb-2 text-2xl tracking-tight text-gray-900 dark:text-white text-center">Weather in
                    <strong>{{ Request::get('city') }}</strong>
                </h5>

                <h5 class="mb-2 text-2xl tracking-tight text-gray-900 dark:text-white text-center">
                    <strong>{{ $currentWeather->temp_C }} ℃</strong>
                    <span class="text-base ml-3">{{ $currentWeather->temp_F }} °F</span>
                </h5>

                <div class="mb-3 font-normal text-gray-500 dark:text-gray-400">
                    <p class="text-xs">{{ $currentWeather->localObsDateTime }}</p>
                    <p>
                        In {{ Request::get('city') }} is {{ $currentWeather->weatherDesc[0]->value }},<br>
                        humidity is: {{ $currentWeather->humidity }} %<br>
                        pressure is: {{ $currentWeather->pressure }} Pa<br>
                        wind speed is: {{ $currentWeather->windspeedKmph }} km/h<br>
                    </p>
                </div>
                <a href="/" class="inline-flex items-center text-blue-600 hover:underline">
                    See other city
                    <svg class="w-3 h-3 ml-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 18 18">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M15 11v4.833A1.166 1.166 0 0 1 13.833 17H2.167A1.167 1.167 0 0 1 1 15.833V4.167A1.166 1.166 0 0 1 2.167 3h4.618m4.447-2H17v5.768M9.111 8.889l7.778-7.778" />
                    </svg>
                </a>
            </div>
            <div class="flex gap-5 mt-5">
                @foreach ($weather->weather as $item)
                    <div class="weather-item">
                        <div
                            class="max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700 text-center">
                            <h5 class="mb-2 text-2xl tracking-tight text-gray-900 dark:text-white text-center">
                                <strong>{{ $item->avgtempC }} ℃</strong>
                                <span class="text-base ml-3">{{ $item->avgtempF }} °F</span>
                            </h5>

                            <div class="mb-3 font-normal text-gray-500 dark:text-gray-400">
                                <p class="text-xs">{{ $item->date }}</p>
                                <ul class="text-sm">
                                    @foreach ($item->hourly as $hourly)
                                        <li
                                            class="w-full border-b-2 border-neutral-100 border-opacity-100 py-4 dark:border-opacity-50">
                                            at time: <strong>{{ FormatDate::hour($hourly->time) }}</strong> will be <strong>{{ $hourly->tempC }}</strong> ℃ and
                                            <strong>{{ $hourly->weatherDesc[0]->value }}</strong>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</body>

</html>

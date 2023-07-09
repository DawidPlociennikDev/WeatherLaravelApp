<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>WatherApp</title>
    <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    @vite('resources/css/app.css')
</head>

<body>
    <div class="flex w-100 bg-slate-800" style="height: 100vh">
        <div class="m-auto w-96 p-5">
            <form action="{{ route('weather_result') }}" method="get">
                <div class="mb-6">
                    <label for="text"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">City:</label>
                    @if ($errors->any())
                        @foreach ($errors->all() as $error)
                            <div class="text-red-600 mb-2">{{ $error }}</div>
                        @endforeach
                    @endif
                    <input type="text" id="text"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="Enter the city for which you want to see the weather" name="city" required>
                </div>
                <button type="submit"
                    class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 block">Check</button>
            </form>
        </div>
    </div>
</body>

</html>

### Start Weather App

Using Laravel 9.x with docker


1. Clone the repo
   ```sh
   git clone https://github.com/DawidPlociennikDev/WeatherLaravelApp
   ```
2. Enter to folder
   ```sh
   cd weatherlaravelapp
   ```
3. Install composer
   ```sh
   composer install
   ```
4. Copy the example env file and make the required configuration changes in the .env file
   ```sh
   cp .env.example .env 
    ```
5. Generate a new application key
   ```sh
   php artisan key:generate
   ```
6. Start the local development server
   ```sh
   php artisan serve
   ```
----------
### Start Weather App with Docker Sail
1. CURL
   ```sh
   curl https://your-domain.com/pogoda_dla_miasta?city={twoje miasto}
   ```
2. Artisan
    ```sh
    php artisan weather:city {twoje miasto}
    ```
    ----------
----------
### Weather commands for terminal
1. CURL
   ```sh
   curl https://your-domain.com/pogoda_dla_miasta?city={twoje miasto}
   ```
2. Artisan
    ```sh
    php artisan weather:city {twoje miasto}
    ```
    ----------
### Run unit tests
```sh
php artisan test
```

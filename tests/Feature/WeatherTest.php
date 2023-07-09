<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class WeatherTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */

    public function test_response_page(): void
    {
        $this->get(route('weather_result'), ['city' => 'Legnica'])->assertStatus(302);
    }

    public function test_response_page_without_param()
    {
        $this->get(route('weather_result'))->assertSessionHasErrors('city')->assertStatus(302);
    }

    public function test_required_city(): void
    {
        $this->json('get', route('weather_result'))
            ->assertStatus(422)
            ->assertJson([
                'message' => 'The city is required',
                'errors' => [
                    'city' => ['The city is required'],
                ],
            ]);
    }
}

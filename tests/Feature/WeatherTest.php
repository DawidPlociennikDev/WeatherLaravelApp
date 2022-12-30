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
    public function test_form_page()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }
    public function test_response_page()
    {
        $response = $this->get('/pogoda_dla_miasta/?city=Legnica');

        $response->assertStatus(200);
    }
}

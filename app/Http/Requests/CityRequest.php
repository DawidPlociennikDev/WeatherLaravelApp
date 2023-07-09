<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CityRequest extends FormRequest
{
    protected $redirect = '/';
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'city' => 'required|min:3|alpha',
        ];
    }

    public function messages()
    {
        return [
            'city.required' => 'The city is required',
            'city.min' => 'The city should have at least 3 signs',
            'city.alpha' => 'The city should consist of the letters themselves',
        ];
    }
}

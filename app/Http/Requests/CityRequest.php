<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CityRequest extends FormRequest
{
    protected $redirect = '/S';
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
            'city.required' => 'Miasto jest wymagane',
            'city.min' => 'Miasto powinno posiadać przynajmniej 3 znaki',
            'city.alpha' => 'Miasto powinno składać się z samych liter',
        ];
    }
}

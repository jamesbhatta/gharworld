<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LocationRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'city_id' => 'nullable|exists:cities,id',
            'type' => 'nullable|in:real-estate,room,local-contact,house,land',
            'min' => 'nullable',
            'max' => 'nullable',
            'for' => 'nullable|in:rent,sale,all'
        ];
    }
}

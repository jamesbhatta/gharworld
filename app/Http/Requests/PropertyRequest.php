<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PropertyRequest extends FormRequest
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
            'type' => 'required|in:house,land,room',
            'for' => 'required|in:rent,sale',
            'title' => 'required',
            'city_id' => 'required|integer',
            'address_line' => 'required',
            'price' => 'required|integer|min:0',
            'facilities' => 'nullable',
            'features' => 'nullable',
            'location' => 'nullable',
            'area' => 'required',
            'price_per' => 'required|in:month,year',
            'description' => 'nullable',
            'status' => 'required',
        ];
    }
}

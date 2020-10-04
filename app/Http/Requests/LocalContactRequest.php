<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LocalContactRequest extends FormRequest
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
            'profession_id' => 'required|exists:professions,id',
            'name' => 'required',
            'city_id' => 'required|exists:cities,id',
            'address_line' => 'required',
            'email' => 'nullable|email',
            'contact' => 'required',
            'image' => 'nullable',
            'qualification' => 'nullable',
            'about' => 'nullable',
        ];
    }
}

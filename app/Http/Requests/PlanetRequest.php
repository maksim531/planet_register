<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PlanetRequest extends FormRequest
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
            'name' => 'required|unique:planets,name|max:255',
            'description' => 'required|max:65535'
        ];
    }

    public function messages()
    {
        return [
            'required' => 'Не заполнены обязателные параметры',
            'max' => 'Превышено максимальное количество символов',
            'unique' => 'Такое значение уже существует'
        ];
    }
}

<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BrandRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name'=>'required|min:2|max:100',
            'image_path'=>'required',
        ];
    }
    public function messages()
    {
        return [
            'required'=>'Поле обов`язкове до заповнення',
            'min'=>'Поле має мати не менше :min символів',
            'max'=>'Поле має мати не більше :max символів',
        ];
    }
}

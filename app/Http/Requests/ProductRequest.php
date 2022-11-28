<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
            'brand_id'=>'required',
            'name'=>'required|min:3|max:100',
            'diametr_id'=>'required',
            'profile_id'=>'required',
            'width_id'=>'required',
            'season'=>'required',
            'image_path'=>'required',
            'price'=>'required|numeric|min:1',
            'status'=>'required',
        ];
    }
    public function messages()
    {
        return [
            'required'=>'Поле обов`язкове до заповнення',
            'min'=>'Поле має мати не менше :min символів',
            'max'=>'Поле має мати не більше :max символів',
            'price.min'=>'Поле має мати значення не менш ніж 1',
        ];
    }
}

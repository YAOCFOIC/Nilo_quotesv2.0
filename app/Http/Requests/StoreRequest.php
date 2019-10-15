<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
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
            'category'=>'required',
            'question'=>'required',
            'solution'=>'required',
            'files'=>'mimes:jpeg,png,jpg',
        ];


    }

    public function message()
    {
        return [
            'category.required'=>'El campo categoría es requerido',
            'question.required'=>'El campo pregunta es requerido',
            'solution.required'=>'El campo solución es requerido',
        
        ];
    }
}

<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {

        return [
            'name' => ['required', 'max:100', 'min:3'],
            'price' => ['required'],
            'description' => ['nullable', 'max:1000'],
            'published' => ['required'],
            'image'=> ['required'],
            'color' => ['required'],
            'year_product' => ['required'],
            'category_id' => ['required'],
            'type_model_id' => ['required'],
            'user_id' => ['required'],
        ];
    }
    public function messages()
    {
        $msgMin = 'O minimo de caracteres é :min, para esse campo';
        $msgMax = 'O máximo de caracteres é :max, para esse campo';

        return [

            'name.required' => 'O campo nome é obrigatório',
            'name.min' => $msgMin,
            'name.max' => $msgMax,

            'price.required' => 'O campo do preço é obrigatório',

            'description.max' => $msgMax,

            'published.required' => 'O campo de status é obrigatório',

            'image.required' => 'O campo imagem é obrigatório',

            'color.required' => 'O campo cor é obrigatório',

            'year_product.required' => 'O campo ano do produto é obrigatório',

            'category_id.required' => 'O campo categoria é obrigatório',

            'type_model_id.required' => 'O campo modelo é obrigatório',

            'user_id.required' => 'O campo usúario é obrigatório',

        ];
    }
}

<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUpdateProductRequest extends FormRequest
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
        //$this->id
        $id = $this->segment(2);

        return [
            'name' => "required|min:3|max:255|unique:products,name,{$id},id",
            'description' => 'required|min:3|max:10000',
            'price' => 'required|regex:/^\d+(\.\d{1,2})?$/',
            'photo' => 'nullable|image',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Nome é obrigatório',
            'name.min' => 'Ops! Precisa informar pelo menos 3 caracteres',
            'name.max' => 'Ops! Pode informar no máximo 255 caracteres',
            'name.unique' => 'Esse produto já foi cadastrado',
            'description.required' => 'Descrição é obrigatório',
            'description..min' => 'Ops! Precisa informar pelo menos 3 caracteres',
            'description..max' => 'Ops! Pode informar no máximo 10000 caracteres',
            'price.required' => 'Preço é obrigatório',
            'price.regex' => 'Favor informar um preço no seguinte formato 00.0'
        ];
    }
}

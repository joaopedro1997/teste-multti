<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreMulttiUsuarioRequest extends FormRequest
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
        'nome'=>'required',
        'telefone' => [
          'required',
          Rule::unique('multti_usuarios', 'telefone')
        ],
        'email' => [
          'email',
          'required',
          Rule::unique('multti_usuarios', 'email')
        ],
        'senha' => 'required'
      ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
      return [
        'nome.required' => 'O campo nome é obrigatório.',
        'telefone.required' => 'O campo telefone é obrigatório.',
        'senha.required' => 'O campo senha é obrigatório.',
        'email.email' => 'Email invalido.',
        'email.unique' => 'Email ja cadastrado.',
        'telefone.unique' => 'Telefone ja cadastrado.',
      ];
    }
}
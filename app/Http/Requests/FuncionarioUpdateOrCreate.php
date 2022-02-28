<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Validator;


class FuncionarioUpdateOrCreate extends FormRequest
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
        $user_id = auth()->user()->id;
        $id = $this->funcionario;
        return
        [
            'nome'                  => ['required', 'string', 'min:3'],
            'cpf'                   =>
                [
                    'required',
                    'string',
                    Rule::unique('funcionarios')
                        ->ignore($user_id, 'user_id')
                ],
            'carteira_trabalho'     => ['required', 'string'],
            'setor'                 => ['required', 'integer'],
            'telefone'              => 'required'
        ];
    }

    public function messages()
    {
        return [
            'required'              => 'O campo :attribute precisa ser preenchido.',
            'nome.min'              => 'Insira um nome com mais de três caracteres.',
            'cpf.unique'            => 'Já existe um registro desse CPF cadastrado.',
        ];
    }
}

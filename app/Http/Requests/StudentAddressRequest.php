<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class StudentAddressRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array|string>
     */
    public function rules(): array
    {
        $rules = [
            'student.name' => 'required|string',
            'student.last_name' => 'required|string',
            'student.code' => 'required|string',

        ];

        if ($this->has('address')) {
            $rules['address.cep'] = 'required|string';
            $rules['address.logradouro'] = 'required|string';
            $rules['address.complemento'] = 'nullable|string';
            $rules['address.bairro'] = 'required|string';
            $rules['address.localidade'] = 'required|string';
            $rules['address.uf'] = 'required|string';
        }

        return $rules;
    }

    public function messages(): array
    {
        return [
            'student.name.required' => 'O nome do aluno é obrigatório.',
            'student.name.string' => 'O nome do aluno deve ser uma string.',
            'student.lastName.required' => 'O sobrenome do aluno é obrigatório',
            'student.lastName.string' => 'O sobrenome do aluno deve ser uma string',
            'student.code.required' => 'A matricula do aluno é obrigatório',
            'student.code.string' => 'A matricula do aluno deve ser uma string',

            'address.logradouro.required' => 'O logradouro do endereço é obrigatório.',
            'address.logradouro.string' => 'O logradouro do endereço deve ser uma string',
            'address.complemento.required' => 'O complemento do endereço é obrigatório.',
            'address.bairro.required' => 'O nome do aluno é obrigatório.',
            'address.bairro.string' => 'O bairro do endereço deve ser uma string',
            'address.localidade.required' => 'A localidade do endereço é obrigatório.',
            'address.localidade.string' => 'A localidade do endereço deve ser uma string',
            'address.uf.required' => 'A uf do endereço é obrigatório.',
            'address.uf.string' => 'A uf do endereço deve ser uma string',
        ];
    }
}

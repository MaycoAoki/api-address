<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SearchAddressRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $rules = [];

        if ($this->has('cep')) {
            $rules['cep'] = 'required|string';
        }

        if ($this->has('logradouro')) {
            $rules = [
                'logradouro' => 'required|string',
                'localidade' => 'required|string',
                'uf' => 'required|string|size:2',

            ];
        }
        return $rules;
    }
}

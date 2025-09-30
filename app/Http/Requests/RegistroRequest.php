<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegistroRequest extends FormRequest
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
        return [
            'sensor_id' => 'required',
            'valor' => 'required|min:2',
            'unidade' => 'required|min:2',
            'data_hora' => 'required'
        ];
    }

    public function messages(){
        return [
        'sensor_id.required' => 'Campo obrigatório',
        'valor.min'=> 'O mínimo de caracteres são 2',
        'valor.required' => 'Campo obrigatório',
        'unidade.required' => 'Campo obrigatório',
        'unidade.min'=> 'O mínimo de caracteres são 2',
        'data_hora.required' => 'Campo obrigatório'
        ];
    }
}
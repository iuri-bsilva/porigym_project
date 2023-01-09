<?php

namespace App\Http\Requests\Contato;

use Illuminate\Foundation\Http\FormRequest;

class ContatoPutRequest extends FormRequest
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
            "telefone" => ["required", "string"],
            "id_usuario" => ["required"]
        ];
    }

    public function messages()
    {
        return [
            "required" => "O campo :attribute é obrigatorio",
            "string" => "Telefone inválido."
        ];
    }
}

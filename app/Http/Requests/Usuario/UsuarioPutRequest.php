<?php

namespace App\Http\Requests\Usuario;

use Illuminate\Foundation\Http\FormRequest;

class UsuarioPutRequest extends FormRequest
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
            "nome" => ["required", "string"],
            "email" => ["required", "email"],
            "senha" => ["required"],
            "id_academia" => ["required"],
            "ativo" => ["required", "boolean"]
        ];
    }

    public function messages()
    {
        return [
            "required" => "O campo :attribute é obrigatorio",
            "email" => "É necessário definir um email válido no campo :attribute",
            "string" => "É necessario inserir um nome válido"
        ];
    }
}

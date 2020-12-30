<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUpdateLeader extends FormRequest
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
        $rules = [
            "tx_nome"       => "required|string",
            "dt_nascimento" => "required|date",
            "nu_ddd"        => "integer",
            "nu_telefone"   => "integer",
            "perfil_id"     => "required|exists:tb_perfil,id",
        ];
        switch ($this->method()) {
            case 'PUT':
                $rules["email"] = "required|email|unique:users,email,".$this->route('leaderId');
                break;
            case 'POST':
                $rules["password"] = "required";
                $rules["email"]    = "required|email|unique:users,email";
                break;
        }

        return $rules;
    }
}

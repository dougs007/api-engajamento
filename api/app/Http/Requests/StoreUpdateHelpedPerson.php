<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUpdateHelpedPerson extends FormRequest
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
            'tx_nome'       => "required|string",
            'nu_ddd'        => "required|integer|min:2",
            'nu_telefone'   => "required|integer",
            'dt_nascimento' => "required|date",
            'lider_id'      => "required|integer",
        ];
    }
}

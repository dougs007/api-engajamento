<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUpdatePersonActivity extends FormRequest
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
            "atividade_id" => "required|exists:tb_atividades,id",
            "pessoa_id"    => "required|exists:tb_pessoas,id",
            "dt_periodo"   => "required|date",
        ];
    }
}

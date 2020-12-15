<?php

namespace App\Http\Resources\Auth;

use Illuminate\Http\Resources\Json\JsonResource;

class LeaderResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id'            => $this->id,
            'tx_nome'       => $this->tx_nome,
            'email'         => $this->email,
//            'nu_ddd'        => $this->nu_ddd,
            'nu_telefone'   => $this->nu_telefone,
            'dt_nascimento' => $this->dt_nascimento,
            'created_at'    => $this->created_at,
        ];
    }
}

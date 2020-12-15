<?php

namespace App\Http\Resources\Api;

use Illuminate\Http\Resources\Json\JsonResource;

class HelpedPersonResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id'            => $this->id,
            'tx_nome'       => $this->tx_nome,
            'nu_ddd'        => $this->nu_ddd,
            'nu_telefone'   => $this->nu_telefone,
            'dt_nascimento' => $this->dt_nascimento,
            'lider_id'      => new LeaderResource($this->getLeader),
        ];
    }
}

<?php

namespace App\Http\Resources\Api;

use Illuminate\Http\Resources\Json\JsonResource;

class PersonActivityResource extends JsonResource
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
            'id'           => $this->id,
            'dt_periodo'   => $this->dt_periodo,
            'atividade_id' => $this->atividade_id ? new ActivityResource($this->activity) : null,
            'pessoa_id'    => $this->pessoa_id ? new HelpedPersonResource($this->helpedPerson) : null,
        ];
    }
}

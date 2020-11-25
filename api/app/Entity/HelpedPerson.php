<?php

namespace App\Entity;

use Illuminate\Database\Eloquent\{Model, SoftDeletes};

class HelpedPerson extends Model
{
    Use SoftDeletes;

    protected $table = 'tb_pessoas';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'tx_nome', 'dt_nascimento', 'nu_ddd', 'nu_telefone', 'lider_id', 'deleted_id'
    ];

    /**
     * Relacionamento de Líder com Pessoas Ajudadas.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
/*    public function lider()
    {
        return $this->belongsTo(\App\Entity\User::class, 'lider_id', 'id');
    }*/
}

<?php

namespace App\Entity;

use Illuminate\Database\Eloquent\{Model, SoftDeletes};

class Roles extends Model
{
    Use SoftDeletes;
    protected $table = 'tb_perfil';

    const ADMIN  = 1;
    const LEADER = 2;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'tx_nome', 'tx_descricao'
    ];
}
